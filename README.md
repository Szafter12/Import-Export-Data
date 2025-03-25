# Project: Import Data from Excel File to Database

## Description
A web application that allows importing data from an Excel file into a selected database table. The user can:
- Select an Excel file for import
- Specify the table name where the data should be inserted
- Choose the number of columns to import
- Map Excel columns to database column names

## Technologies
- **Backend**: PHP
- **Frontend**: JavaScript (AJAX), Bootstrap
- **Libraries**:
  - [PhpSpreadsheet](https://phpspreadsheet.readthedocs.io/) – for handling Excel files
  - Bootstrap – for UI styling

## Requirements
- PHP (recommended version 7.4+ or 8.x)
- Composer
- Local server (XAMPP, built-in PHP server, etc.)
- MySQL as the database

## Installation
1. **Clone the repository:**
   ```sh
   git clone https://github.com/Szafter12/Import-Export-Data.git
   cd Import-Export-Data
   ```

2. **Install dependencies:**
   ```sh
   composer update
   ```

3. **Configure the database:**
   - Set up your database credentials in the `.env` file:
     ```env
     DB_HOST=your-database-host
     DB_NAME=your-database-name
     DB_USER=your-database-username
     DB_PASS=your-database-password
     ```

4. **Run the application:**
   - If using XAMPP, place the project in `htdocs` and start Apache
   - If using PHP's built-in server, run:
     ```sh
     php -S localhost:8000
     ```

## Usage
1. Open a browser and go to `http://localhost:8000`
2. Select an Excel file for import
3. Choose the database table
4. Specify the number of columns to import
5. Map Excel columns to database columns
6. Confirm and wait for the process to complete


## Author
Jakub Pachut

