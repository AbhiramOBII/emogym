# 🌐 Multi-Language Implementation Guide - Emogym

## ✅ Current Setup

Your application now supports **English (EN)** and **Kannada (ಕನ್ನಡ)** languages with automatic font switching.

---

## 📁 File Structure

```
resources/
├── lang/
│   ├── en/                    # English translations
│   │   ├── navigation.php     # Header/navigation translations
│   │   ├── footer.php         # Footer translations
│   │   ├── home.php           # Home page translations
│   │   └── admin-dashboard.php # Admin translations
│   └── kn/                    # Kannada translations
│       ├── navigation.php
│       ├── footer.php
│       ├── home.php
│       └── admin-dashboard.php
```

---

## 🎯 How It Works

### 1. **Language Switching**

**Route:** `/lang/{locale}`
```php
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'kn'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
});
```

**Buttons in Header:**
- **EN** button → Switches to English
- **ಕ** button → Switches to Kannada

### 2. **Using Translations in Blade**

**Syntax:**
```blade
{{ __('file.key') }}
```

**Examples:**
```blade
<!-- From home.php -->
{{ __('home.tara') }}                    → Tara / ತಾರಾ
{{ __('home.discover') }}                → Full description text
{{ __('home.register_now') }}            → Register Now / ಈಗ ನೋಂದಾಯಿಸಿ

<!-- From navigation.php -->
{{ __('navigation.home') }}              → Home / ಮುಖಪುಟ
{{ __('navigation.programs') }}          → Programs / ಕಾರ್ಯಕ್ರಮಗಳು
```

---

## 📝 Adding New Translations

### Step 1: Add to English File

**File:** `resources/lang/en/home.php`

```php
return [
    'new_key' => 'English Text Here',
];
```

### Step 2: Add to Kannada File

**File:** `resources/lang/kn/home.php`

```php
return [
    'new_key' => 'ಕನ್ನಡ ಪಠ್ಯ ಇಲ್ಲಿ',
];
```

### Step 3: Use in Blade Template

```blade
<h1>{{ __('home.new_key') }}</h1>
```

---

## 🎨 Font Switching

**Automatic font switching** is configured in `layouts/app.blade.php`:

```css
/* English Font */
html[lang="en"] body {
    font-family: 'DM Sans', sans-serif !important;
}

/* Kannada Font */
html[lang="kn"] body {
    font-family: 'Baloo Tamma 2', sans-serif !important;
}
```

**Fonts Used:**
- **English:** DM Sans (Google Fonts)
- **Kannada:** Baloo Tamma 2 (Google Fonts)

---

## 📋 Complete Translation Keys

### Home Page (`home.php`)

| Key | English | Kannada |
|-----|---------|---------|
| `tara` | Tara | ತಾರಾ |
| `sandesh` | Sandesh | ಸಂದೇಶ |
| `hero_title_1` | Begin Your | ನಿಮ್ಮ |
| `hero_title_2` | Emotional Wellness | ಭಾವನಾತ್ಮಕ ಸ್ವಾಸ್ಥ್ಯ |
| `hero_title_3` | Journey | ಪ್ರಯಾಣವನ್ನು ಪ್ರಾರಂಭಿಸಿ |
| `start_journey` | Start Your Journey | ನಿಮ್ಮ ಪ್ರಯಾಣವನ್ನು ಪ್ರಾರಂಭಿಸಿ |
| `register_now` | Register Now | ಈಗ ನೋಂದಾಯಿಸಿ |
| `fully_booked` | Fully Booked | ಸಂಪೂರ್ಣ ಬುಕ್ ಆಗಿದೆ |
| `unlimited_seats` | Unlimited seats | ಅನಿಯಮಿತ ಸ್ಥಾನಗಳು |
| `seats_left` | seats left | ಸ್ಥಾನಗಳು ಉಳಿದಿವೆ |
| `view_all_programs` | View All Programs | ಎಲ್ಲಾ ಕಾರ್ಯಕ್ರಮಗಳನ್ನು ವೀಕ್ಷಿಸಿ |
| `read_more` | Read More | ಇನ್ನಷ್ಟು ಓದಿ |

---

## 🔧 Implementation Example

### Before (Hardcoded):
```blade
<h1>Begin Your Emotional Wellness Journey</h1>
<button>Register Now</button>
```

### After (Multi-language):
```blade
<h1>
    {{ __('home.hero_title_1') }} 
    {{ __('home.hero_title_2') }} 
    {{ __('home.hero_title_3') }}
</h1>
<button>{{ __('home.register_now') }}</button>
```

**Result:**
- **English:** Begin Your Emotional Wellness Journey
- **Kannada:** ನಿಮ್ಮ ಭಾವನಾತ್ಮಕ ಸ್ವಾಸ್ಥ್ಯ ಪ್ರಯಾಣವನ್ನು ಪ್ರಾರಂಭಿಸಿ

---

## 📱 Language Persistence

Language preference is stored in **session**:
```php
Session::put('locale', $locale);
```

**Middleware** applies it automatically:
```php
app()->setLocale(Session::get('locale', 'en'));
```

---

## 🎯 Creating New Translation Files

### For Programs Page:

**1. Create:** `resources/lang/en/programs.php`
```php
<?php
return [
    'title' => 'Our Programs',
    'description' => 'Explore our programs',
    'filter_all' => 'All Programs',
];
```

**2. Create:** `resources/lang/kn/programs.php`
```php
<?php
return [
    'title' => 'ನಮ್ಮ ಕಾರ್ಯಕ್ರಮಗಳು',
    'description' => 'ನಮ್ಮ ಕಾರ್ಯಕ್ರಮಗಳನ್ನು ಅನ್ವೇಷಿಸಿ',
    'filter_all' => 'ಎಲ್ಲಾ ಕಾರ್ಯಕ್ರಮಗಳು',
];
```

**3. Use in Blade:**
```blade
<h1>{{ __('programs.title') }}</h1>
<p>{{ __('programs.description') }}</p>
```

---

## ✨ Best Practices

### 1. **Organize by Section**
```php
// Good
'hero_title' => 'Title',
'hero_subtitle' => 'Subtitle',

// Bad
'title1' => 'Title',
'subtitle2' => 'Subtitle',
```

### 2. **Use Descriptive Keys**
```php
// Good
'register_now' => 'Register Now',
'view_all_programs' => 'View All Programs',

// Bad
'btn1' => 'Register Now',
'link2' => 'View All Programs',
```

### 3. **Add Comments**
```php
return [
    // Hero Section
    'hero_title' => 'Title',
    
    // Stats Section
    'years_experience' => '10+ Years',
];
```

### 4. **Keep Translations Consistent**
Use the same translation for repeated phrases across files.

---

## 🚀 Quick Reference

### Common Translation Patterns:

**Buttons:**
```blade
{{ __('home.register_now') }}
{{ __('home.read_more') }}
{{ __('home.view_all_programs') }}
```

**Titles:**
```blade
{{ __('home.upcoming_programs') }}
{{ __('home.our_services') }}
{{ __('home.latest_insights') }}
```

**Status Messages:**
```blade
{{ __('home.fully_booked') }}
{{ __('home.unlimited_seats') }}
{{ __('home.no_programs') }}
```

---

## 🎨 Language Button Styling

**Active Language:**
- Background: `bg-primary` (#FF4F73)
- Highlighted with border

**Inactive Language:**
- Background: `bg-white/20`
- Hover: `bg-primary`

---

## 📊 Translation Progress

✅ **Completed:**
- Navigation/Header
- Footer
- Home Page (Hero, Stats, Videos, Services, Programs, Blog)
- Admin Dashboard

🔄 **To Do:**
- Programs Page
- Services Page
- Blog Page
- Contact Page
- Registration Modal
- Gallery Page

---

## 💡 Tips

1. **Test both languages** after adding translations
2. **Keep text length similar** in both languages for UI consistency
3. **Use proper Kannada Unicode** characters
4. **Clear cache** after updating translation files:
   ```bash
   php artisan cache:clear
   php artisan config:clear
   ```

---

## 🎯 Next Steps

1. **Add more pages:** Create translation files for remaining pages
2. **Database content:** Add Kannada fields to database tables (already done for programs)
3. **Admin panel:** Translate admin interface completely
4. **Validation messages:** Translate form validation messages

---

## 📞 Support

For adding more languages or customizing translations, update:
1. Translation files in `resources/lang/`
2. Language buttons in `header.blade.php`
3. Route validation in `web.php`

---

**🎉 Your multi-language system is ready to use!**
