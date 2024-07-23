

# Date Manipulation Script

This PHP script provides functions for date manipulation and validation using the Carbon library. The script includes functions to repair date formats, convert dates to a specific format, and check if a date has expired based on a given validity period.

## Prerequisites

- PHP 7.2 or later
- Composer
- Carbon Library

## Installation

1. Clone the repository or download the PHP script.
2. Run `composer install` to install the Carbon library.

## Usage

The script contains three main functions:

### 1. `repairDate($date)`

This function repairs dates formatted with slashes (`/`) into a format with hyphens (`-`) in the `Y-m-d` format.

#### Parameters

- `$date` (string): The date string that needs to be repaired.

#### Returns

- A string representing the repaired date in `Y-m-d` format.

#### Example

```php
$date = "12/07/1999";
echo repairDate($date); // Outputs: "1999-07-12"
```

### 2. `convertToYMD($dateString, $dateFormat = null)`

This function converts a date string into the `Y-m-d` format using the Carbon library. It can parse dates using a specified format or automatically.

#### Parameters

- `$dateString` (string): The date string to convert.
- `$dateFormat` (string|null): The format of the input date string (optional).

#### Returns

- A string representing the date in `Y-m-d` format, or an error message if the format is invalid.

#### Example

```php
$dateString = "12-07-1999";
echo convertToYMD($dateString, "d-m-Y"); // Outputs: "1999-07-12"
```

### 3. `isExpired($issueDate, $validityYears)`

This function checks if a given issue date has expired based on a specified number of validity years.

#### Parameters

- `$issueDate` (string): The issue date in `Y-m-d` format.
- `$validityYears` (int): The number of years for which the date is valid.

#### Returns

- A string indicating whether the validity period has expired or is still active.

#### Example

```php
$issueDate = '1999-07-12';
$validityYears = 5;
echo isExpired($issueDate, $validityYears); // Outputs: "Masa Berlaku Sudah Habis"
```

## Error Handling

- `convertToYMD()` handles `InvalidFormatException` to return a friendly error message when an invalid date format is provided.
- General exceptions are caught to provide a descriptive error message.

## Conclusion

This script is a utility for manipulating dates, particularly useful for validating expiration dates and formatting date strings. It leverages the Carbon library for robust date manipulation and comparison.

---

This README provides a comprehensive overview of the functionality and usage of your script, along with examples to demonstrate its application.