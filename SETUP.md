# Emogym Laravel Website Setup

## Overview
This is a multilingual Laravel website for Emogym (English and Kannada support) with a modern dark theme design.

## Features
- ✅ Multilingual support (English/Kannada)
- ✅ Responsive design with mobile menu
- ✅ Modern dark theme with Tailwind CSS
- ✅ Professional header with dual logos
- ✅ Language switching functionality
- ✅ Complete page structure (Home, About, Services, Programs, Blog, Contact)

## Setup Instructions

### 1. Install Dependencies
```bash
composer install
npm install
```

### 2. Environment Configuration
Copy `.env.example` to `.env` and configure:
```bash
APP_NAME="Emogym"
APP_LOCALE=en
APP_FALLBACK_LOCALE=en
```

### 3. Generate Application Key
```bash
php artisan key:generate
```

### 4. Add Required Images
Place the following images in `public/images/`:
- `EmoGym-logo.png` - Main Emogym logo
- `Bhavanathmaka-2-white.webp` - Secondary logo

### 5. Start Development Server
```bash
php artisan serve
```

The website will be available at: `http://localhost:8000`

### 6. View the Website
- **Home Page**: `http://localhost:8000/` - Complete homepage with header and footer
- **Language Switching**: Click the EN/ಕ buttons in the header to switch languages
- **Mobile Menu**: Use the hamburger menu on mobile devices
- **Navigation**: All menu items are functional and link to their respective pages

## Language Files
- English: `resources/lang/en/navigation.php`
- Kannada: `resources/lang/kn/navigation.php`

## Pages Structure
- Home: `/`
- About: `/about`
- Services: `/services`
- Programs: `/programs`
- Blog: `/blog`
- Contact: `/contact`

## Language Switching
Visit `/lang/{locale}` where locale is `en` or `kn` to switch languages.

## Mobile Menu
The mobile menu is fully functional with smooth animations and backdrop blur effects.

## Customization
- Colors are defined in Tailwind config in the main layout
- Primary color: `#FF4F73`
- Accent color: `#8A6EFA`
- Gold color: `#edc368`

## Next Steps
1. Add the required logo images
2. Customize content for each page
3. Add contact form functionality
4. Set up database if needed for blog/dynamic content
5. Configure email settings for contact form
