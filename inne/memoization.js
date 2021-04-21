/**
 * Memoization is an optimization technique used to 
 * speed up programs by storing the results of expensive function calls 
 * and returning the cached result.
 * When the same inputs occur again, of course.
 * In JS functions are objects, so we can use objects fields to cache data
 */

"use strict";
/**
 * simple recursion function find factorial
 * @param n 
 * @returns factorial(n)
 */
const factorial = (n) => {

    if (!factorial.results[n]) {

        if (n == 1) {
            factorial.results[n] = 1;
        } else {
            factorial.results[n] = n * factorial(n - 1);
        }

    }

    console.log(`from cache: factorial(${n}) = ${factorial.results[n]}`);
    return factorial.results[n];

}

factorial.results = {};

console.log(factorial(5));
console.log(factorial(4));