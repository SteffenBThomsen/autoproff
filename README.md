# AUTOProff test

My general thoughts while creating this project:

- The frontend should be de-coupled from the backend
- This meant that i needed a lightweight framework and as the test specified i couldn't use any, I had to create it myself.
- The thoughts behind the framework was a pure REST API Crud approach

### Database scheme

The mysql commands used to create the database can be seen here:

```
/database/dump.sql
```

### Installation

To get this project up and running on a local development setting using PHPStorm you need to do the following

- Clone this repository

  ```
    git clone https://github.com/SteffenBThomsen/autoproff.git
  ```
  
- In your php storm settings you have to enable "Allow unsigned requests" at:

  ```
    Settings > Build, Execution and Deployment > Debugger > Build-in server
  ```
  
- Create a sqlite database connection 

  ```
    View > Tool Windows > Database
  ```
  
  Here you make a database connection with the SQLite database driver.
  The database file is located in /database/autoproff.sqlite
  
- PHP 7.2 is required to run this project

- Run

  ```
  composer update
  ```
  
- Run the application by right clicking on /public/html/index.html and pressing "Open in browser"

### Abstraction

General thought on making this application better

- Create a better Request entry handling - parsing the request on to the different controllers
- Creating a more robust response class
- Create a single point exception handler for catching exception, this will make the controllers more clean
- Extend the database scheme with a relation from car to equipment for storing data about the cars equipment like ABS, radio
- Extend the existing tables cars, engines, models with further parameters like Kilometers per litre, gears, doors ...
- Search is at the moment handled by a front end filter, this is all good and well if there aren't to many items on the page.
  This should be handled differently, up until a point this can be done by mysql queries, further optimizations after this gets slow as well, could be to store data in a NoSQL database og generating a php plugin in C that handles the actual search
- Write PHPUnit test for the backend API, for testing routes and response formats 

In general i would never contemplate not using a framework of some sorts. Modern framework gives a lot of functionality and testability, increasing development time.
