# Image Color Matrix Processor

<div align="center">

![GitHub last commit](https://img.shields.io/github/last-commit/ariferol01/image-color-matrix)
![GitHub license](https://img.shields.io/github/license/ariferol01/image-color-matrix)
![PHP Version](https://img.shields.io/badge/PHP-%3E%3D7.0-blue)

NumPHP kütüphanesi kullanılarak geliştirilmiş görüntü işleme ve matris manipülasyonu örneği.
</div>

## 📌 Özellikler

- 🖼️ Görüntüyü RGB matrisine dönüştürme
- 🎨 Gelişmiş renk analizi ve tespiti
- 🌈 10 farklı renk kategorisi
  - Ana renkler (RGB)
  - Ara renkler (Sarı, Cyan, Magenta, Turuncu, Kahverengi)
  - Gri tonlar (Açık/Koyu)
- 🔍 Görüntü büyütme (2x)
- 📊 NumPHP ile matris işlemleri

## 🚀 Başlangıç

### Gereksinimler

- PHP 7.0 veya üzeri
- NumPHP kütüphanesi
- GD kütüphanesi

### Kurulum

1. Projeyi klonlayın:
```bash
git clone https://github.com/ariferol01/image-color-matrix.git
cd image-color-matrix
```

2. Composer ile bağımlılıkları yükleyin:
```bash
composer install
```

3. Görüntü işlemek için:
```bash
php index.php
```

## 💡 Kullanım

1. `images` klasörüne işlemek istediğiniz görseli `cat.png` olarak kaydedin
2. Scripti çalıştırın
3. İşlenmiş görsel `images/cat_processed.png` olarak kaydedilecektir

### Örnek Çıktı

<div align="center">
<table>
  <tr>
    <td><b>Orijinal Görsel</b></td>
    <td><b>İşlenmiş Görsel</b></td>
  </tr>
  <tr>
    <td><img src="images/cat.png" width="400" alt="Orijinal Görsel"></td>
    <td><img src="images/cat_processed.png" width="400" alt="İşlenmiş Görsel"></td>
  </tr>
</table>
</div>

## ⚙️ Renk Analizi Parametreleri

| Parametre | Açıklama | Varsayılan Değer |
|-----------|----------|------------------|
| `$COLOR_DOMINANCE` | Renk baskınlığı eşiği | 1.15 |
| `$GREY_THRESHOLD` | Gri ton tespit hassasiyeti | 20 |
| `$DARK_THRESHOLD` | Koyu renk eşiği | 200 |
| `$LIGHT_GREY_THRESHOLD` | Açık gri eşiği | 500 |
| `$MIN_COLOR_INTENSITY` | Minimum renk yoğunluğu | 100 |

## 🤝 Katkıda Bulunma

1. Bu depoyu fork edin
2. Yeni bir branch oluşturun (`git checkout -b feature/yeniOzellik`)
3. Değişikliklerinizi commit edin (`git commit -am 'Yeni özellik eklendi'`)
4. Branch'inizi push edin (`git push origin feature/yeniOzellik`)
5. Pull Request oluşturun

## 📄 Lisans

Bu proje MIT lisansı altında lisanslanmıştır. Detaylar için [LICENSE](LICENSE) dosyasına bakınız.

## 📁 Proje Yapısı

```
image-color-matrix/
├── images/
│   └── .gitkeep
├── docs/
│   └── images/
│       ├── original.png
│       └── processed.png
├── vendor/
├── .gitignore
├── README.md
├── composer.json
├── index.php
└── LICENSE
```

## 🔗 Bağlantılar

- [NumPHP Dokümantasyonu](https://github.com/NumPHP/NumPHP)
- [PHP GD Kütüphanesi](https://www.php.net/manual/en/book.image.php)

## 🤖 AI Katkısı

Bu proje [Cursor](https://cursor.sh/) AI asistanı yardımıyla geliştirilmiştir.

<div align="center">
  <img src="https://img.shields.io/badge/Made%20with-Cursor%20AI-blue?style=for-the-badge&logo=data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAYAAAAfSC3RAAAACXBIWXMAAAsTAAALEwEAmpwYAAABB0lEQVR42mNgoBAwInGYgPg/EDtAaWYGhABIEMQG4o9A/B+I3wLxMyB+AsR/gPgVEP8E4r9QsXdA/AGI/0GNBgFmKI0DPAHi/0D8Coj/APEfKP4NxN+h+AcQf4YaAgJXgPg3EP+E4t9A/AOKfwLxLyj+BcS/gfgnEP+Csn8B8U8g/g3Ef4D4LxD/BeL/QAw2+j+U/gvEf6D4NxD/AuI/QPwbiH8B8R+o+D+oC0GGwowGBTksUP8C8V8g/g3Ef6H4DxD/huJfQPwDin8C8S8o+xsQw4LOBOQcGyD+BMQ/gPgnEP+C4l9A/B2Kv0Pxd6hL/0NjA4Q5oFHHCDWQCYi5oeL4AQBkvo/3KZ/QSAAAAABJRU5ErkJggg==">
</div>
