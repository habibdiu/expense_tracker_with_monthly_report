<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Expense Tracker with Monthly Report

A simple Laravel-based expense tracking system with daily expenses, category management, and monthly summary reports.

## Features
- Add daily expenses (title, amount, date, category)
- Fixed categories: Food, Transport, Shopping, Others
- List all expenses (latest first)
- Monthly report grouped by category
- Authentication for users
- Simple Blade templates

![Expense List](screenshots/login_page.PNG)
![Add Expense](screenshots/admin_dashboard.PNG)
![Add Expense](screenshots/add_category.PNG)
![Expense List](screenshots/add_expense.PNG)
![Expense List](screenshots/expense_list.PNG)

## Requirements
- PHP >= 8.1
- Composer
- MySQL
- Node.js & npm (optional if using frontend assets)

## Installation / Setup

1. Clone the repository:
```bash
git clone https://github.com/habibdiu/expense_tracker_with_monthly_report
cd expense-tracker
