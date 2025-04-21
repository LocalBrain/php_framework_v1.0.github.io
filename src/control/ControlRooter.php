<?php

class ControlRooter
{
    // ------------------------
    // 🟩 Gestion du JSON-LD (SEO enrichi pour Google)
    // ------------------------
    public function gestionDuJsonLd($url, $data = [])
    {
        switch ($url) {
            case 'accueil':
                return [
                    "@context" => "https://schema.org",
                    "@type" => "WebPage",
                    "name" => "Accueil - Mon Site",
                    "url" => "https://monsite.com/accueil",
                    "description" => "Page d'accueil de Mon Site"
                ];

            case 'contact':
                return [
                    "@context" => "https://schema.org",
                    "@type" => "ContactPage",
                    "name" => "Contact - Mon Site",
                    "url" => "https://monsite.com/contact",
                    "contactType" => "customer service",
                    "telephone" => "+33-6-12-34-56-78"
                ];

            case 'article':
                return [
                    "@context" => "https://schema.org",
                    "@type" => "Article",
                    "headline" => $data['title'] ?? "Article Titre",
                    "datePublished" => $data['date'] ?? "2025-04-20",
                    "author" => [
                        "@type" => "Person",
                        "name" => $data['author'] ?? "Auteur inconnu"
                    ],
                    "url" => "https://monsite.com/article/" . ($data['slug'] ?? "")
                ];

            default:
                return [];
        }
    }

    // ------------------------
    // 🟩 Gestion des vues avec SEO
    // ------------------------
    public function gestionDesVues($url)
    {
        $seoData = [
            'canonical' => '',
            'description' => '',
            'keyword' => '',
            'title' => '',
            'h1' => '',
            'page' => ''
        ];

        switch ($url) {
            case "accueil":
                $seoData = [
                    'canonical' => "https://monsite.com/accueil",
                    'description' => "Bienvenue sur la page d'accueil de Mon Site.",
                    'keyword' => "accueil, page d'accueil",
                    'title' => "Accueil - Mon Site",
                    'h1' => "Accueil",
                    'author' => "WebMaster",
                    'page' => "public/vues/navigation/accueil.php"
                ];
                break;

            case "contact":
                $seoData = [
                    'canonical' => "https://monsite.com/contact",
                    'description' => "Contactez-nous pour toute question ou demande.",
                    'keyword' => "contact, service client",
                    'title' => "Contact - Mon Site",
                    'h1' => "Contact",
                    'author' => "WebMaster",
                    'page' => "public/vues/navigation/contact.php"
                ];
                break;

            default:
                $seoData = [
                    'canonical' => "https://monsite.com/accueil",
                    'description' => "Bienvenue sur la page d'accueil de Mon Site.",
                    'keyword' => "accueil, page d'accueil",
                    'title' => "Accueil - Mon Site",
                    'h1' => "Accueil",
                    'author' => "WebMaster",
                    'page' => "public/vues/navigation/accueil.php"
                ];
                break;
        }

        return $seoData;
    }
}
