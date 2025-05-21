<h1>Cara Kolaborasi dengan Github</h1>
<li>Cloning Repository</li>
<li>Running Laravel dari repo Github</li>

<h2>1. Cloning Repository</h2>
<ol>
    <li>Buka repository proyek di GitHub.</li>
    <li>salin link repository</li>
    <li>Buka folder <code>htdocs</code> di dalam <code>xampp</code>.</li>
    <li>Klik kanan di dalam folder, lalu pilih <code>Open Git Bash</code>.</li>
    <li>Jalankan perintah berikut untuk meng-clone repository:</li>
    <pre><code>git clone &lt;url-remote-repository&gt;</code></pre>
    <li>Buka folder proyek hasil clone.</li>
</ol>

<h2>2. Menjalankan Laravel dari Repository GitHub</h2>
<ol>
    <li>Buka terminal VSCode di dalam folder proyek.</li>
    <li>Jalankan perintah berikut untuk menginstal dependency Laravel:</li>
    <pre><code>composer install</code></pre>
    <li>Salin file konfigurasi environment:</li>
    <pre><code>cp .env.example .env</code></pre>
    <li>Generate application key:</li>
    <pre><code>php artisan key:generate</code></pre>
    <li>Jalankan migrasi database:</li>
    <pre><code>php artisan migrate</code></pre>
    <li>Jalankan aplikasi Laravel:</li>
    <pre><code>npm run dev</code></pre>
    <pre><code>php artisan serve</code></pre>
</ol>

