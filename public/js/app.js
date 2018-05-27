var engines;
var brands;
var models;

$(document).ready(function () {

    $.ajax({
        url: "http://localhost:63341/autoproff/api/models/index",
        type: 'GET',
        success: function (result) {
            models = result.data;
        },
        error: function (request, status, error) {
            $("#error > #message").text(request.responseJSON.message);
            $("#error").show();
        }
    });

    $.ajax({
        url: "http://localhost:63341/autoproff/api/engines/index",
        type: 'GET',
        success: function (result) {
            engines = result.data;
        },
        error: function (request, status, error) {
            $("#error > #message").text(request.responseJSON.message);
            $("#error").show();
        }
    });

    $.ajax({
        url: "http://localhost:63341/autoproff/api/brands/index",
        type: 'GET',
        success: function (result) {
            brands = result.data;
        },
        error: function (request, status, error) {
            $("#error > #message").text(request.responseJSON.message);
            $("#error").show();
        }
    });

    var table = $('#cars').DataTable({
        dom: 'Bfrtip',
        pageLength: 25,
        ajax: {
            url: "http://localhost:63341/autoproff/api/cars/index",
            type: 'GET',
            "dataSrc": function (json) {
                return json.data;
            }
        },
        responsive: true,
        columnDefs: [
            {
                visible: true,
                searchable: true
            }
        ],
        buttons: [{
            className: "addCar btn btn-success",
            titleAttr: 'Export in Excel',
            text: 'Create',
            init: function (api, node, config) {
                $(node).removeClass('dt-button')
            }
        }],
        columns: [
            {data: "id"},
            {data: "model.brand.name"},
            {data: "model.name"},
            {data: "description"},
            {data: "year"},
            {data: "mileage"},
            {data: "engine.size"},
            {data: "engine.type"},
            {data: "engine.horsepower"},
            {data: "engine.automatic"},
            {
                data: function (data, type, row) {
                    return '<button  style="text-align: center; display: inline-block;" class="deleteCar btn btn-danger" data-id="' + data.id + '"><span class="glyphicon glyphicon-remove-circle"></span> Delete</button>';
                }
            }
        ],
        order: [[ 0, "desc" ]]
    });

    $('#example').on("click", "button", function () {
        table.row($(this).parents('tr')).remove().draw(false);
    });

    $(document).on('click', '.deleteCar', function () {

        var tr = $(this).parents('tr');

        $.ajax({
            url: "http://localhost:63341/autoproff/api/cars/destroy/" + $(this).data('id') + (new URL(window.location)).search,
            type: 'POST',
            success: function (result) {
                tr.remove().draw(false);
            },
            error: function (request, status, error) {
                $("#error > #message").text(request.responseJSON.message);
                $("#error").show();
            }
        });
    });

    $(document).on('click', '#error > #dismiss', function () {
        $(this).parent().hide();
    });

    $(document).on('click', '.addCar', function (e) {
        $("#addCarModal").modal("show");
    });

    $(".yearSelector").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });

    $('#addCarModal').on('show.bs.modal', function (e) {
        updateBrandSelector();
        updateModelSelector();
        updateEngineSelector();

        $(this).on('change', '#brand_id', function(e) {
            updateModelSelector();
            updateEngineSelector();
        });

        $(this).on('change', '#model_id', function(e) {
            updateEngineSelector();
        });
    });

    $(document).on('click', '#addCarModal .btn-primary', function() {
        $.ajax({
            url: "http://localhost:63341/autoproff/api/cars/create" + (new URL(window.location)).search,
            type: 'POST',
            beforeSend : function(xhr, opts){
                $('form#newCarForm input, select, textarea').each(function(index) {
                        if (!$(this).val() && $(this).attr('name') !== "engine_type") {
                            var parent = $(this).parent('div');
                            parent.addClass("has-error");
                            setTimeout(function() {
                                parent.removeClass("has-error");
                            }, 1500);

                            xhr.abort();
                        }
                    }
                );
            },
            data: $('#newCarForm').serialize(),
            success: function(data) {

                table.ajax.reload();
                $("#addCarModal").modal('toggle');

            },
            error: function (request, status, error) {

            }
        });
    });
});

function updateBrandSelector() {
    $('select#brand_id').find('option').remove();
    $.each(brands, function (key, object) {
        $('select#brand_id').append($("<option/>", {
            value: object.id,
            text: object.name
        }));
    });
}

function updateModelSelector() {
    $('#model_id').find('option').remove();
    $.each(models, function(key, object) {
        if (object.brand_id === $("select#brand_id").val()) {
            $('#model_id').append($("<option/>", {
                value: object.id,
                text: object.name
            }));
        }
    });
}

function updateEngineSelector() {
    $('select#engine_id').find('option').remove();
    $.each(engines, function(key, object) {
        if (object.model_id === $("select#model_id").val()) {

            $('select#engine_id').append($("<option/>", {
                value: object.id,
                text: parseFloat(object.size).toFixed(1) + " L," + " " + (object.type ? " " + object.type + ", " : "") + object.horsepower + " HP" + (object.automatic ? ", Aut." : "")
            }));
        }
    });
}



