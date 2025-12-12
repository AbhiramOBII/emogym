# 🌐 Complete Multi-Language Translation Guide

## ✅ Translation Files Created

All translation files have been created for both English and Kannada:

### Files Created:
- ✅ `resources/lang/en/programs.php` & `resources/lang/kn/programs.php`
- ✅ `resources/lang/en/services.php` & `resources/lang/kn/services.php`
- ✅ `resources/lang/en/gallery.php` & `resources/lang/kn/gallery.php`
- ✅ `resources/lang/en/blog.php` & `resources/lang/kn/blog.php`
- ✅ `resources/lang/en/contact.php` & `resources/lang/kn/contact.php`
- ✅ `resources/lang/en/about.php` & `resources/lang/kn/about.php`

---

## 📝 How to Apply Translations to Each Page

### 1. Programs Page (`programs.blade.php`)

**Replace these lines:**

```blade
<!-- Line 10-11 -->
Our <span class="text-primary">Programs</span>
→ {{ __('programs.title') }} <span class="text-primary">{{ __('programs.programs') }}</span>

<!-- Line 14 -->
Join our transformative workshops and programs designed to enhance your mental wellness journey
→ {{ __('programs.description') }}

<!-- Line 56 -->
{{ number_format($program->discount_percentage, 0) }}% OFF
→ {{ number_format($program->discount_percentage, 0) }}% {{ __('programs.off') }}

<!-- Line 68 -->
Unlimited seats
→ {{ __('programs.unlimited_seats') }}

<!-- Line 73 -->
{{ $remainingSlots }} {{ $remainingSlots === 1 ? 'seat' : 'seats' }} left
→ {{ $remainingSlots }} {{ $remainingSlots === 1 ? __('programs.seat_left') : __('programs.seats_left') }}

<!-- Line 78 -->
Fully Booked
→ {{ __('programs.fully_booked') }}

<!-- Line 93 -->
<i class="fas fa-times-circle"></i> Fully Booked
→ <i class="fas fa-times-circle"></i> {{ __('programs.fully_booked') }}

<!-- Line 105 -->
Register Now
→ {{ __('programs.register_now') }}

<!-- Line 115 -->
No upcoming programs at the moment.
→ {{ __('programs.no_programs') }}
```

---

### 2. Services Page (`services.blade.php`)

**Replace these lines:**

```blade
<!-- Line 10 -->
Our {{ __('navigation.services') }}
→ Already translated!

<!-- Line 16 -->
No services available at the moment.
→ {{ __('services.no_services') }}
```

---

### 3. Gallery Page (`gallery.blade.php`)

**Replace these lines:**

```blade
<!-- Line 12 -->
Our Gallery
→ {{ __('gallery.title') }}

<!-- Line 15 -->
Explore moments from our programs, workshops, and community events.
→ {{ __('gallery.description') }}

<!-- Line 23 -->
<i class="fas fa-th mr-2"></i>All
→ <i class="fas fa-th mr-2"></i>{{ __('gallery.all') }}

<!-- Line 27 -->
<i class="fas fa-image mr-2"></i>Images
→ <i class="fas fa-image mr-2"></i>{{ __('gallery.images') }}

<!-- Line 31 -->
<i class="fas fa-video mr-2"></i>Videos
→ <i class="fas fa-video mr-2"></i>{{ __('gallery.videos') }}

<!-- Find "No items found" message and replace with -->
{{ __('gallery.no_items') }}
```

---

### 4. Blog Page (`blog.blade.php`)

**Replace these lines:**

```blade
<!-- Title -->
Our <span class="text-primary">Blog</span>
→ {{ __('blog.title') }} <span class="text-primary">{{ __('blog.blog') }}</span>

<!-- Description -->
Read our latest articles on emotional wellness and personal growth
→ {{ __('blog.description') }}

<!-- No articles message -->
No articles available at the moment.
→ {{ __('blog.no_articles') }}

<!-- Read More button -->
Read More
→ {{ __('blog.read_more') }}

<!-- Author byline -->
By
→ {{ __('blog.by') }}

<!-- Date prefix -->
on
→ {{ __('blog.on') }}
```

---

### 5. Blog Detail Page (`blog-detail.blade.php`)

**Replace these lines:**

```blade
<!-- Back button -->
Back to Blog
→ {{ __('blog.back_to_blog') }}

<!-- Related articles section -->
Related Articles
→ {{ __('blog.related_articles') }}

<!-- Read More -->
Read More
→ {{ __('blog.read_more') }}
```

---

### 6. Contact Page (`contact.blade.php`)

**Replace these lines:**

```blade
<!-- Title -->
Get in Touch
→ {{ __('contact.title') }}

<!-- Description -->
Have questions? We'd love to hear from you...
→ {{ __('contact.description') }}

<!-- Form labels -->
Your Name → {{ __('contact.name') }}
Your Email → {{ __('contact.email') }}
Phone Number → {{ __('contact.phone') }}
Your Message → {{ __('contact.message') }}
Send Message → {{ __('contact.send') }}

<!-- Contact info section -->
Contact Information → {{ __('contact.contact_info') }}
Address → {{ __('contact.address') }}
Phone → {{ __('contact.phone_label') }}
Email → {{ __('contact.email_label') }}
Follow Us → {{ __('contact.follow_us') }}
```

---

### 7. About Page (`about.blade.php`)

**Replace these lines:**

```blade
<!-- Title -->
About Us
→ {{ __('about.title') }}

<!-- Section headings -->
Our Story → {{ __('about.our_story') }}
Our Mission → {{ __('about.our_mission') }}
Our Vision → {{ __('about.our_vision') }}
Our Values → {{ __('about.our_values') }}
Meet Our Team → {{ __('about.meet_team') }}
```

---

## 🔍 Quick Find & Replace Guide

Use your IDE's find and replace feature (Ctrl+H) for each page:

### Programs Page:
1. Find: `Our <span class="text-primary">Programs</span>`
   Replace: `{{ __('programs.title') }} <span class="text-primary">{{ __('programs.programs') }}</span>`

2. Find: `Unlimited seats`
   Replace: `{{ __('programs.unlimited_seats') }}`

3. Find: `Fully Booked`
   Replace: `{{ __('programs.fully_booked') }}`

4. Find: `Register Now`
   Replace: `{{ __('programs.register_now') }}`

### Gallery Page:
1. Find: `Our Gallery`
   Replace: `{{ __('gallery.title') }}`

2. Find: `>All</a>`
   Replace: `>{{ __('gallery.all') }}</a>`

3. Find: `>Images</a>`
   Replace: `>{{ __('gallery.images') }}</a>`

4. Find: `>Videos</a>`
   Replace: `>{{ __('gallery.videos') }}</a>`

### Contact Page:
1. Find: `Get in Touch`
   Replace: `{{ __('contact.title') }}`

2. Find: `Send Message`
   Replace: `{{ __('contact.send') }}`

---

## ✅ Testing Checklist

After applying translations:

- [ ] Programs page - Switch between EN/KN
- [ ] Services page - Switch between EN/KN
- [ ] Gallery page - Switch between EN/KN
- [ ] Blog page - Switch between EN/KN
- [ ] Blog detail page - Switch between EN/KN
- [ ] Contact page - Switch between EN/KN
- [ ] About page - Switch between EN/KN

---

## 📊 Translation Keys Reference

### Programs (`programs.php`):
```php
'title' => 'Our' / 'ನಮ್ಮ'
'programs' => 'Programs' / 'ಕಾರ್ಯಕ್ರಮಗಳು'
'description' => 'Join our transformative...' / 'ನಿಮ್ಮ ಮಾನಸಿಕ...'
'no_programs' => 'No upcoming programs...' / 'ಪ್ರಸ್ತುತ ಯಾವುದೇ...'
'unlimited_seats' => 'Unlimited seats' / 'ಅನಿಯಮಿತ ಸ್ಥಾನಗಳು'
'seats_left' => 'seats left' / 'ಸ್ಥಾನಗಳು ಉಳಿದಿವೆ'
'seat_left' => 'seat' / 'ಸ್ಥಾನ'
'fully_booked' => 'Fully Booked' / 'ಸಂಪೂರ್ಣ ಬುಕ್ ಆಗಿದೆ'
'register_now' => 'Register Now' / 'ಈಗ ನೋಂದಾಯಿಸಿ'
'off' => 'OFF' / 'ರಿಯಾಯಿತಿ'
```

### Gallery (`gallery.php`):
```php
'title' => 'Our Gallery' / 'ನಮ್ಮ ಗ್ಯಾಲರಿ'
'description' => 'Explore moments...' / 'ನಮ್ಮ ಕಾರ್ಯಕ್ರಮಗಳು...'
'all' => 'All' / 'ಎಲ್ಲಾ'
'images' => 'Images' / 'ಚಿತ್ರಗಳು'
'videos' => 'Videos' / 'ವೀಡಿಯೊಗಳು'
'no_items' => 'No items found.' / 'ಯಾವುದೇ ಐಟಂಗಳು...'
```

### Blog (`blog.php`):
```php
'title' => 'Our' / 'ನಮ್ಮ'
'blog' => 'Blog' / 'ಬ್ಲಾಗ್'
'description' => 'Read our latest articles...' / 'ಭಾವನಾತ್ಮಕ ಸ್ವಾಸ್ಥ್ಯ...'
'no_articles' => 'No articles available...' / 'ಪ್ರಸ್ತುತ ಯಾವುದೇ...'
'read_more' => 'Read More' / 'ಇನ್ನಷ್ಟು ಓದಿ'
'by' => 'By' / 'ಲೇಖಕರು'
'on' => 'on' / 'ದಿನಾಂಕ'
'back_to_blog' => 'Back to Blog' / 'ಬ್ಲಾಗ್‌ಗೆ ಹಿಂತಿರುಗಿ'
'related_articles' => 'Related Articles' / 'ಸಂಬಂಧಿತ ಲೇಖನಗಳು'
```

### Contact (`contact.php`):
```php
'title' => 'Get in Touch' / 'ನಮ್ಮನ್ನು ಸಂಪರ್ಕಿಸಿ'
'description' => 'Have questions?...' / 'ಪ್ರಶ್ನೆಗಳಿವೆಯೇ?...'
'name' => 'Your Name' / 'ನಿಮ್ಮ ಹೆಸರು'
'email' => 'Your Email' / 'ನಿಮ್ಮ ಇಮೇಲ್'
'phone' => 'Phone Number' / 'ದೂರವಾಣಿ ಸಂಖ್ಯೆ'
'message' => 'Your Message' / 'ನಿಮ್ಮ ಸಂದೇಶ'
'send' => 'Send Message' / 'ಸಂದೇಶ ಕಳುಹಿಸಿ'
'contact_info' => 'Contact Information' / 'ಸಂಪರ್ಕ ಮಾಹಿತಿ'
'address' => 'Address' / 'ವಿಳಾಸ'
'phone_label' => 'Phone' / 'ದೂರವಾಣಿ'
'email_label' => 'Email' / 'ಇಮೇಲ್'
'follow_us' => 'Follow Us' / 'ನಮ್ಮನ್ನು ಅನುಸರಿಸಿ'
```

---

## 🎯 Priority Order

Apply translations in this order:

1. **Programs Page** (Most important - already started)
2. **Gallery Page** (High traffic)
3. **Contact Page** (User interaction)
4. **Blog Pages** (Content pages)
5. **Services Page** (Simple)
6. **About Page** (Simple)

---

## 💡 Tips

1. **Use Find & Replace** - Much faster than manual editing
2. **Test after each page** - Switch languages to verify
3. **Check mobile view** - Ensure text fits properly
4. **Verify forms** - Make sure placeholders are translated
5. **Check buttons** - All CTAs should be translated

---

**🎉 All translation files are ready! Just apply them to the blade templates using the guide above.**
