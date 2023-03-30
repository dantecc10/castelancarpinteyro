// Read input from user
const n = parseInt(prompt("Enter the index of the day in the year 2023 (2 <= n <= 364): "));

// Calculate the number of days until the next Sunday
const daysUntilSunday = 7 - ((n - 2) % 7 + 1);

// Print the result
console.log(`There are ${daysUntilSunday} days until the next Sunday.`);
