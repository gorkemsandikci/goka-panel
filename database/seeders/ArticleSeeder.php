<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'title' => 'CAESAR RESORT ÖZELLIKLERI',
            'sub_title' => 'sub_title',
            'description' => 'description',
            'monotag' => 'bir iki ',
            'ditag' => 'iki kelime',
            'tritag' => 'uc kelime',
            'slug' => 'uzanti-ne-olmali',
            'image' => 'image',
            'category_id' => 1,
            'full_text' => 'Caesar Resort, AFIK GROUP Firmasının Kuzey Kıbrıs Türk Cumhuriyeti İskelede bulunan ilk konut projesidir. İlk Etabının yapımı 2008 yılında başlarken, Caesar Resort projesinde hayat 2009 yılında başlamıştır. İçerisinde Yüzlerce farklı sosyal donatıyla sahip, İskele Bölgesinin en büyük konut projesi Caesar Resort, Kuzey Kıbrıs Türk Cumhuriyeti İskelede avantajlı konut fiyatları ve kaliteli işletme hizmetiyle; yatırımcıların dikkatini en çok çeken konut projesidir.
Caesar Resort uluslararası bir hizmet kalitesine, yoğunlukla yabancı yatırımcı ve yabancı ağırlıklı bir sosyal yaşam popülasyonuna sahiptir.
Proje içerisinde hemen teslim, 2023 teslim tarihli, 2024 teslim tarihli, 2025 teslim tarihli ve 2026 teslim tarihli olmak üzere toplamda 4 farklı etabın yapımı devam etmektedir.
İçerisinde yaşam devam eden ve teslime hazır, her biri 8 bloktan 4 etap barındrımakta ve çok sayıda Kuzey Kıbrıs Türk Cumhuriyeti ziyaretçilerine hizmet vermektedir.
İçerisinde çok sayıda aktivite alanı ve sosyal yaşam merkezleri barındıran, bölgenin en geniş sosyal yaşam alanı konut projesi Caesar Resort;
Kolay ödeme yöntemi ve kiralama hizmeti kalitesiyle, gayrimenkul yatırımcılarının ve Kıbrısta yaşamak isteyenlerin olumlu yorumlarını almaktadır.    Kuzey Kıbrıs Türk Cumhuriyeti İskeledeki ilk yaşam alanı konseptindeki konut projesi Caesar Resort & Spa, içerisinde çok sayıda havuz, sosyal alışveriş alanları, hizmet alanları ve tam donanımlı bir hastane hizmetine sahiptir.
Caesar Resort konut projesi içerisinde Studio (1+0), 1+1 ve 2+1
daire tiplerinde seçenekler bulunmaktadır. Caesar Resort otel konseptli rezidans hizmeti, geniş ve ferak kullanım alanlarının yanı sıra, konut kalitesi ve üstün hizmet kalitesi bulunan sosyal donatıları ile tecrübesini ön plana çıkarıyor.'
        ]);
    }
}
