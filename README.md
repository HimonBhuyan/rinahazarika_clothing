# Rina Hazarika (ৰীণা হাজৰিকা) • Axomiya Bastra & Alonkar

An authentic, fully responsive Assamese traditional e-commerce web application dedicated to handwoven **Pure Muga Silk**, **Mulberry Paat**, **Organic Eri Peace Silk Mekhela Sador**, and handcrafted **24K gold-washed Bihu ornaments** (Gamkharu, Jonbiri, Dholbiri, Golpota, and Pepabiri).

---

## 🌺 Cultural & Craft Highlights

- **Pure Sualkuchi Silks**: 100% Silk Mark certified Pure Golden Muga, Mulberry Paat, and Eri silk handlooms with authentic royal motifs like *Kingkhap (সিংখাপ)*, *Jaapi (জাপি)*, and *Kopou Phool (কপৌ ফুল)*.
- **Ranthali & Barpeta Traditional Jewellery**: Handcrafted 24-karat gold-washed (*Kesha-Xaun*) ornaments crafted using ancient repoussé and filigree techniques.
- **Interactive 2D Attire & Ornament Anatomy Explorer**: Visualizer demonstrating how traditional Mekhela Sador and Bihu jewels are worn with cultural significance.
- **Assamese Gifting Experience**: Optional traditional red-and-white ceremonial Gamusa gift wrapping with handwritten blessings.
- **Festive Privileges**: Dynamic Rongali Bihu seasonal discounts (`BIHU2026`) and free pan-India insured delivery tracker.

---

## 🛠️ Technology Stack

- **Backend**: Laravel 12 / PHP 8.3
- **Frontend**: Blade Templating, Tailwind CSS (Vite v8)
- **Database**: SQLite (Automated migrations & authentic seeds)
- **Architecture**: Modular Services (`CartService`), Eloquent Models, Resource Controllers

---

## 🚀 Local Installation & Setup

1. **Clone the repository**:
   ```bash
   git clone https://github.com/HimonBhuyan/rinahazarika_clothing.git
   cd rinahazarika_clothing
   ```

2. **Install PHP dependencies**:
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies & build assets**:
   ```bash
   npm install
   npm run build
   ```

4. **Environment setup & database migration**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   touch database/database.sqlite
   php artisan migrate --seed
   ```

5. **Start the development server**:
   ```bash
   php artisan serve
   ```
   Open `http://localhost:8000` in your browser.

---

## 🧪 Testing & Code Standards

- **Feature & Unit Tests**:
  ```bash
  php artisan test
  ```
- **Code Style (Laravel Pint)**:
  ```bash
  vendor/bin/pint --format agent
  ```

---

## 📜 Cultural Dedication

*“ৰূপালী সপোন, সোণালী বয়ন — অসমীয়া পৰম্পৰাৰ অনুপম নিদৰ্শন”*  
**জয় আই অসম (Joy Aai Axom)**
