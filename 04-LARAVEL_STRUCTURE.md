# Green Darma Pharmaceuticals
# 04-LARAVEL_STRUCTURE.md

## Laravel Project Structure

Framework: Laravel 12
Database: MySQL

## Root Structure

app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/

## App Structure

Http/
 Controllers/
 Middleware/
 Requests/

Models/
Services/
Repositories/
Helpers/
Policies/
Providers/

## Controllers

HomeController
ProductController
CategoryController
ContactController

Admin/
 DashboardController
 ProductController
 CategoryController
 CompanyController
 SeoController
 MediaController
 ProfileController

## Models

Product
Category
ProductImage
CompanySetting
SeoSetting
Admin
ContactMessage

## Routes

/
products
/products/{slug}
/about
/contact

/admin
/admin/products
/admin/categories
/admin/settings
/admin/media
/admin/seo

## Blade Layout

layouts/
components/
home/
products/
about/
contact/
admin/

## Storage

storage/app/public/products
storage/app/public/company

## Authentication

Laravel Authentication

Admin Login

Forgot Password

Profile

## Middleware

auth
guest
verified
admin

## Validation

Form Request Validation

Unique Slug

Required Fields

Secure Upload

## Image Upload Flow

Upload

Compress

Generate WebP

Store

Display

## Coding Standards

PSR-12

MVC

Service Layer

Repository Pattern Ready

## Security

CSRF

XSS Protection

SQL Injection Protection

Validation

## Performance

Caching

Pagination

Lazy Loading

Optimized Queries

## Deployment

Shared Hosting Ready

VPS Ready

Production Environment

## Future Ready

REST API

Blog

Doctor Portal

Distributor Portal

Analytics

Notifications
