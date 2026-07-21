# Green Darma Pharmaceuticals
# 03-DATABASE.md

## Database Design Specification

Version: 1.0

## Database Engine
- MySQL 8+
- UTF8MB4
- InnoDB

---

# Tables

## admins
- id
- name
- email
- password
- profile_photo
- role
- status
- last_login
- timestamps

---

## categories
- id
- name
- slug
- description
- image
- status
- timestamps

---

## products
- id
- category_id
- name
- slug
- generic_name
- brand_name
- strength
- dosage_form
- pack_size
- manufacturer
- short_description
- full_description
- indications
- dosage
- side_effects
- contraindications
- warnings
- storage
- price
- featured_image
- seo_title
- meta_description
- meta_keywords
- status
- timestamps

---

## product_images
- id
- product_id
- image
- sort_order
- timestamps

---

## company_settings
- id
- company_name
- logo
- favicon
- about
- address
- phone
- email
- website
- facebook
- linkedin
- youtube
- footer_text
- timestamps

---

## contact_messages
- id
- name
- email
- phone
- subject
- message
- is_read
- timestamps

---

## seo_settings
- id
- page
- meta_title
- meta_description
- keywords
- canonical_url
- og_image
- timestamps

---

# Relationships

Category
1 ---- Many Products

Product
1 ---- Many Product Images

---

# Indexes

PRIMARY KEY

INDEX slug

INDEX category_id

INDEX status

INDEX created_at

FULLTEXT name

FULLTEXT generic_name

---

# Validation

Product Name Required

Slug Unique

Price Numeric

Image JPG PNG WEBP

Maximum Upload Size 5MB

---

# Image Storage

storage/app/public/products

Automatic WebP Generation

Thumbnail Creation

---

# Laravel Models

Admin

Category

Product

ProductImage

CompanySetting

SeoSetting

ContactMessage

---

# Migrations

create_admins_table

create_categories_table

create_products_table

create_product_images_table

create_company_settings_table

create_contact_messages_table

create_seo_settings_table

---

# Seeder

Admin Seeder

Category Seeder

Company Seeder

Sample Products Seeder

---

# Future Tables

blogs

news

careers

downloads

doctors

distributors

analytics

notifications

---

# Database Goals

Fast

Scalable

SEO Friendly

Normalized

Secure

Production Ready
