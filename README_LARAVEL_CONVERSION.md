# TMSDRIVER - Laravel 11 Conversion Documentation

## 📋 Overview

Aplikasi driver **Taxido** untuk Transportation Management System (TMS) yang telah dikonversi dari HTML statis ke **Laravel 11** dengan fitur **Progressive Web App (PWA)**.

## 🚀 Tech Stack

- **Framework**: Laravel 11
- **PHP Version**: 8.4+
- **Database**: SQLite/MySQL
- **Frontend**: Bootstrap 5, HTML5, CSS3, JavaScript
- **PWA**: Service Worker, Web App Manifest
- **Icons**: Iconsax
- **Maps**: Google Maps API (ready to integrate)

## 📁 Project Structure

```
TMSDRIVER/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Auth/
│   │       │   └── AuthController.php          # Authentication & OTP
│   │       ├── Dashboard/
│   │       │   └── DashboardController.php     # Home Dashboard
│   │       ├── Driver/
│   │       │   ├── DocumentController.php      # Document Verification
│   │       │   └── VehicleController.php       # Vehicle Registration
│   │       ├── Profile/
│   │       │   └── ProfileController.php       # Profile & Settings
│   │       ├── Ride/
│   │       │   └── RideController.php          # Ride Management
│   │       └── Wallet/
│   │           └── WalletController.php        # Wallet & Transactions
│   │
│   └── Models/
│       ├── Driver.php                          # Driver Model (Authenticatable)
│       ├── DriverDocument.php                  # Documents
│       ├── Vehicle.php                         # Vehicles
│       ├── Ride.php                            # Rides
│       ├── Wallet.php                          # Wallet
│       ├── WalletTransaction.php               # Transactions
│       ├── Offer.php                           # Promotions
│       ├── Notification.php                    # Notifications
│       ├── Chat.php                            # In-app Chat
│       └── Otp.php                             # OTP Verification
│
├── database/
│   └── migrations/
│       ├── *_create_drivers_table.php          # Drivers table
│       ├── *_create_driver_documents_table.php # Documents
│       ├── *_create_vehicles_table.php         # Vehicles
│       ├── *_create_rides_table.php            # Rides
│       ├── *_create_wallets_table.php          # Wallets
│       ├── *_create_wallet_transactions_table.php
│       ├── *_create_offers_table.php           # Offers
│       ├── *_create_notifications_table.php    # Notifications
│       ├── *_create_chats_table.php            # Chats
│       └── *_create_otps_table.php             # OTP
│
├── public/
│   ├── css/                                    # Stylesheets
│   ├── js/                                     # JavaScript files
│   ├── images/                                 # Images & icons
│   ├── fonts/                                  # Custom fonts
│   └── service-worker.js                       # PWA Service Worker
│
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php                   # Master Layout
│       └── driver/                             # Original HTML templates (to be converted)
│
└── routes/
    └── web.php                                 # All application routes
```

## 🗄️ Database Schema

### 1. Drivers Table
Menyimpan informasi driver dan authentication.

**Columns:**
- `id`, `name`, `email`, `phone`, `country_code`
- `password`, `profile_photo`
- `rating`, `total_rides`, `completed_rides`, `cancelled_rides`, `total_earnings`
- `status` (active/inactive/suspended)
- `verification_status` (pending/verified/rejected)
- `referral_code`, `referred_by`
- `is_online`, `current_latitude`, `current_longitude`
- Timestamps & soft deletes

### 2. Driver Documents Table
Upload dan verifikasi dokumen driver.

**Document Types:**
- Birth Certificate
- Certificate of Registration
- Driving License
- National ID
- Pan Card

**Columns:**
- `driver_id`, `document_type`, `document_path`
- `document_number`, `issue_date`, `expiry_date`
- `status` (pending/approved/rejected)
- `rejection_reason`, `verified_at`

### 3. Vehicles Table
Informasi kendaraan driver.

**Columns:**
- `driver_id`, `vehicle_name`, `plate_number`
- `vehicle_type` (bike/car/van/bus)
- `vehicle_color`, `max_seats`, `registration_date`
- `vehicle_brand`, `vehicle_model`, `year`
- `rules` (JSON: no_food, no_pets, no_smoking, etc)
- `vehicle_photo`, `status`, `is_verified`

### 4. Rides Table
Manajemen perjalanan/ride (tabel paling kompleks).

**Columns:**
- `ride_number`, `driver_id`, `passenger_id`, `vehicle_id`
- Pickup: `pickup_address`, `pickup_latitude`, `pickup_longitude`
- Dropoff: `dropoff_address`, `dropoff_latitude`, `dropoff_longitude`
- `status` (pending/accepted/driver_arrived/on_way/completed/cancelled)
- `estimated_fare`, `final_fare`, `distance_km`
- `estimated_duration_minutes`, `actual_duration_minutes`
- OTP: `verification_otp`, `otp_verified`
- Rating: `driver_rating`, `driver_review`, `passenger_rating`, `passenger_review`
- Timestamps: `accepted_at`, `driver_arrived_at`, `started_at`, `completed_at`, `cancelled_at`
- `cancellation_reason`, `cancelled_by`

### 5. Wallets Table
Dompet digital driver.

**Columns:**
- `driver_id`, `balance`, `total_earned`, `total_withdrawn`
- `currency`

### 6. Wallet Transactions Table
History transaksi wallet.

**Columns:**
- `transaction_number`, `wallet_id`, `ride_id`
- `type` (earning/withdrawal/topup/refund/deduction)
- `amount`, `balance_before`, `balance_after`
- `description`, `status`, `payment_method`
- `reference_number`, `completed_at`

### 7. Offers Table
Promo dan diskon.

**Columns:**
- `driver_id`, `title`, `description`, `code`
- `discount_type` (percentage/fixed_amount)
- `discount_value`, `max_discount`, `min_ride_amount`
- `valid_from`, `valid_until`
- `usage_limit`, `used_count`
- `applicable_areas` (JSON), `applicable_vehicle_types` (JSON)
- `is_active`, `is_global`

### 8. Notifications Table
Push notifications untuk driver.

**Columns:**
- `driver_id`, `title`, `message`
- `type` (ride_request/ride_update/payment/system/promotion)
- `related_id`, `related_type`
- `is_read`, `read_at`

### 9. Chats Table
Messaging antara driver dan passenger.

**Columns:**
- `ride_id`, `driver_id`, `passenger_id`
- `sender_type` (driver/passenger)
- `message`, `is_read`, `read_at`

### 10. OTPs Table
Verifikasi OTP untuk berbagai keperluan.

**Columns:**
- `phone`, `country_code`, `otp`
- `purpose` (login/registration/ride_verification/password_reset)
- `is_verified`, `expires_at`, `verified_at`
- `attempts`

## 🛣️ Routes Structure

### Public Routes (Guest)

```php
GET  /                      # Onboarding page
GET  /login                 # Login page
POST /login                 # Process login
GET  /signup                # Registration page
POST /signup                # Process registration
GET  /otp                   # OTP verification page
POST /otp/verify            # Verify OTP
POST /otp/resend            # Resend OTP
```

### Protected Routes (Authenticated Drivers)

#### Driver Registration Flow
```php
GET  /driver/document-verify            # Document upload page
POST /driver/document-upload            # Upload documents
GET  /driver/vehicle-registration       # Vehicle registration
POST /driver/vehicle-registration       # Save vehicle
GET  /driver/bank-details               # Bank details form
POST /driver/bank-details               # Save bank details
```

#### Dashboard
```php
GET  /home                              # Dashboard home
POST /logout                            # Logout
```

#### Ride Management
```php
GET  /ride/accept/{ride}                # Accept ride page
POST /ride/accept/{ride}                # Confirm accept
GET  /ride/active                       # Active rides
GET  /ride/verification/{ride}          # Passenger OTP verification
POST /ride/verify-otp/{ride}            # Verify passenger OTP
GET  /ride/on-way/{ride}                # Ongoing ride tracking
POST /ride/complete/{ride}              # Complete ride
GET  /ride/my-rides                     # Ride history (pending/complete/cancelled)
GET  /ride/{ride}/details               # Ride details
POST /ride/{ride}/cancel                # Cancel ride
POST /ride/{ride}/rate                  # Rate ride
```

#### Wallet Management
```php
GET  /wallet                            # Wallet overview
GET  /wallet/topup                      # Topup page
POST /wallet/topup                      # Process topup
GET  /wallet/withdraw                   # Withdraw page
POST /wallet/withdraw                   # Process withdrawal
GET  /wallet/transactions               # Transaction history
```

#### Offers & Promotions
```php
GET  /offer                             # Offer list
GET  /offer/edit/{offer}                # Edit offer
POST /offer/update/{offer}              # Update offer
POST /offer/toggle/{offer}              # Toggle offer status
```

#### Profile & Settings
```php
GET  /profile/settings                  # Settings page
GET  /profile/profile-setting           # Profile setting
POST /profile/profile-update            # Update profile
GET  /profile/app-setting               # App settings (RTL, Dark mode, etc)
POST /profile/app-setting               # Update app settings
```

#### Communication
```php
GET  /chat/{ride}                       # Chat with passenger
POST /chat/{ride}/send                  # Send message
```

#### Notifications
```php
GET  /notifications                     # Notification list
POST /notifications/{id}/read           # Mark as read
```

### PWA Routes
```php
GET  /manifest.json                     # PWA manifest
GET  /service-worker.js                 # Service worker
```

## 🎨 Application Flows

### 1. Onboarding & Authentication Flow
```
Onboarding (/) → Login → OTP Verification → Home Dashboard
         ↓
    Signup → OTP → Document Upload → Vehicle Registration → Bank Details → Complete
```

### 2. Ride Management Flow
```
Home Dashboard → View New Ride → Accept Ride → Verify Passenger OTP →
Start Trip → Navigate → Complete Ride → Rate → Receive Payment
```

### 3. Registration Flow (3 Steps)
```
Step 1: Document Verification
  - Upload Birth Certificate
  - Upload Certificate of Registration
  - Upload Driving License
  - Upload National ID
  - Upload Pan Card

Step 2: Vehicle Registration
  - Select Vehicle Type (Bike/Car/Van/Bus)
  - Enter Vehicle Details (Name, Color, Seats, Plate Number)
  - Set Driver Rules (No Food, No Pets, No Smoking, etc)

Step 3: Bank Details
  - Enter Bank Account Information
  - Link Payment Methods
```

### 4. Daily Operations Flow
```
Login → Online Mode → Receive Ride Request → Accept →
Pickup Customer → OTP Verification → Start Trip →
Navigate (Google Maps) → Arrive Destination → Complete →
Rate Passenger → View Earnings → Update Wallet
```

## 🔐 Authentication System

### Driver Authentication
- Custom guard: `auth:driver`
- Model: `App\Models\Driver` (extends Authenticatable)
- Login methods:
  - Phone + Password
  - Phone + OTP
  - Social Login (Google, Apple) - Ready to integrate

### OTP System
- Purpose-based OTP (login, registration, ride verification, password reset)
- 6-digit OTP code
- Expiration time
- Attempt tracking
- Resend functionality

## 💰 Wallet System

### Features:
- Real-time balance tracking
- Earning from completed rides (automatic)
- Manual topup
- Withdrawal to bank
- Transaction history:
  - Trip History (earnings from rides)
  - Withdraw History
- Multiple payment methods:
  - Mastercard
  - Visa
  - PayPal
  - Google Pay
  - Apple Pay
  - Bank Transfer

## 🎁 Offer/Promotion System

### Features:
- Create driver-specific offers
- System-wide global offers
- Discount types:
  - Percentage discount
  - Fixed amount discount
- Restrictions:
  - Minimum ride amount
  - Valid date range
  - Usage limit
  - Applicable areas (JSON)
  - Applicable vehicle types (JSON)
- Toggle active/inactive status
- Edit offer details

## 📱 PWA Features

### Manifest Configuration
- App Name: "Taxido Driver"
- Theme Color: #199675
- Display Mode: Standalone
- Icons: 40x40 to 512x512
- Start URL: /

### Service Worker Features
- Offline capability
- Cache management
- Push notifications support
- Background sync (ready to implement)
- Asset caching:
  - CSS files
  - JavaScript files
  - Images
  - Fonts

### Install Prompt
- "Add to Home Screen" functionality
- iOS and Android support
- Custom install UI (ready in original templates)

## 🗺️ Google Maps Integration

### Features (Ready to Implement):
- Real-time driver location tracking
- Route calculation and display
- Turn-by-turn navigation
- Distance calculation
- Multiple markers:
  - User location
  - Destination
  - Driver/Car position
- Custom map styling
- Route optimization

### Required:
- Google Maps API Key (set in .env)
- Update `custom-map.js` with API integration

## 🔔 Notification System

### Notification Types:
1. **Ride Request** - New ride available
2. **Ride Update** - Status changes
3. **Payment** - Earnings, withdrawals
4. **System** - App updates, maintenance
5. **Promotion** - New offers, discounts

### Features:
- Real-time notifications (ready for Pusher/Laravel Echo)
- Push notifications via service worker
- In-app notification center
- Read/Unread status
- Related entity linking

## 💬 Chat System

### Features:
- Ride-specific chat rooms
- Driver ↔ Passenger messaging
- Real-time messaging (ready for WebSocket)
- Message history
- Read receipts
- Chat UI (`chatting.js`)

## 📊 Driver Dashboard

### Metrics Displayed:
- Total Earnings
- Complete Rides Count
- Pending Rides Count
- Cancelled Rides Count
- Driver Rating (average)
- Wallet Balance

### Quick Actions:
- View New Ride Requests
- Access Active Rides
- Check Wallet
- View/Manage Offers
- Update Profile
- Settings

## 🚗 Vehicle Management

### Vehicle Types Supported:
- Bike
- Car
- Van
- Bus

### Vehicle Information:
- Vehicle Name & Model
- Registration Number (Plate)
- Color
- Maximum Seats
- Registration Date
- Brand & Year
- Vehicle Photo
- Driver Rules (JSON):
  - Max 2 in the back
  - No food allowed
  - No pets allowed
  - No smoking
  - No alcohol

### Vehicle Status:
- Active
- Inactive
- Maintenance

## 📄 Document Verification System

### Document Types Required:
1. Birth Certificate
2. Certificate of Registration
3. Driving License
4. National ID / ID Proof
5. Pan Card

### Verification Flow:
```
Upload → Pending Review → Admin Approval/Rejection → Verified
```

### Features:
- Document number storage
- Issue & expiry date tracking
- Rejection reason feedback
- Re-upload capability
- Verification timestamp

## 🎨 UI/UX Features

### Navigation Patterns:
- **Bottom Navigation Bar** (4 tabs):
  - Home
  - Active Ride
  - My Rides
  - Settings

- **Sidebar Menu**:
  - Profile quick access
  - Main navigation
  - RTL/Dark mode toggles
  - Logout

### Theme Support:
- **Light Mode** (default)
- **Dark Mode** (localStorage persistence)
- **RTL Support** (Right-to-Left)
- Automatic system preference detection

### Interactive Features:
- Swiper sliders (onboarding, galleries)
- Sticky headers
- Lazy loading images
- Interactive maps
- Real-time updates
- OTP auto-focus input
- Image upload preview
- Quantity adjusters (fare offers)

## 🔧 Next Steps to Complete

### 1. Database Setup
```bash
# Install SQLite extension or configure MySQL
# Update .env with database credentials

# Run migrations
php artisan migrate

# (Optional) Seed test data
php artisan db:seed
```

### 2. Template Conversion
Convert remaining HTML files in `resources/views/driver/` to Blade templates:
- Use `@extends('layouts.app')`
- Use `@section('content')`
- Replace hardcoded URLs with `{{ route('name') }}`
- Replace asset paths with `{{ asset('path') }}`

### 3. Controller Implementation
Implement logic in controllers:
- AuthController - OTP sending (Twilio, Nexmo, etc)
- RideController - Ride matching, GPS tracking
- WalletController - Payment gateway integration
- ProfileController - File uploads, profile updates

### 4. Authentication Middleware
Update `config/auth.php`:
```php
'guards' => [
    'driver' => [
        'driver' => 'session',
        'provider' => 'drivers',
    ],
],

'providers' => [
    'drivers' => [
        'driver' => 'eloquent',
        'model' => App\Models\Driver::class,
    ],
],
```

### 5. API Integration
- Google Maps API (navigation, geocoding)
- Payment Gateway (Stripe, PayPal, etc)
- SMS Gateway (OTP sending)
- Push Notification Service (FCM, OneSignal)

### 6. Real-time Features
- Install Laravel Echo & Pusher/Socket.io
- Implement real-time ride updates
- Live chat functionality
- Driver location broadcasting

### 7. File Upload System
- Configure filesystem (local/s3)
- Implement document upload validation
- Image optimization
- Secure file storage

### 8. Testing
```bash
php artisan test
```

### 9. Deployment
- Configure production environment
- Setup SSL certificate
- Enable PWA on HTTPS
- Optimize assets
- Setup cron jobs for:
  - OTP cleanup
  - Expired offers removal
  - Notification cleanup

## 📝 Environment Variables

```env
APP_NAME="Taxido Driver"
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tmsdriver
DB_USERNAME=root
DB_PASSWORD=

# Google Maps
GOOGLE_MAPS_API_KEY=your_api_key

# SMS/OTP
TWILIO_SID=your_sid
TWILIO_AUTH_TOKEN=your_token
TWILIO_PHONE_NUMBER=your_number

# Push Notifications
PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=

# Payment Gateway
STRIPE_KEY=
STRIPE_SECRET=
```

## 🚀 Running the Application

```bash
# Install dependencies
composer install

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate

# Start development server
php artisan serve

# Visit: http://localhost:8000
```

## 📚 Key Files Reference

- **Routes**: `routes/web.php`
- **Controllers**: `app/Http/Controllers/`
- **Models**: `app/Models/`
- **Migrations**: `database/migrations/`
- **Views**: `resources/views/`
- **Assets**: `public/`
- **Service Worker**: `public/service-worker.js`
- **Master Layout**: `resources/views/layouts/app.blade.php`

## 🤝 Contributing

1. Follow Laravel coding standards
2. Use meaningful commit messages
3. Test before committing
4. Update documentation

## 📄 License

Proprietary - TMSDRIVER Project

---

**Version**: 1.0.0
**Framework**: Laravel 11
**Last Updated**: December 2025
