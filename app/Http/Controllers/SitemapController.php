<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubProduct;
use App\Models\blog;
use Illuminate\Support\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // 1. HOME PAGE

        $xml .= '<url>';

        $xml .= '<loc>'
            . htmlspecialchars(
                route('front.home'),
                ENT_XML1,
                'UTF-8'
            )
            . '</loc>';

        $xml .= '<lastmod>'
            . Carbon::now()->toAtomString()
            . '</lastmod>';

        $xml .= '<priority>1.00</priority>';

        $xml .= '</url>' . "\n";
        
        // 2. PRODUCT CATEGORIES: URL: /product/{category}

        $categories = Category::whereNull('deleted_at')
            ->whereNotNull('url')
            ->where('url', '!=', '')
            ->get();

        foreach ($categories as $category)
        {
            $loc = route('subcategorylist', [
                'category' => $category->url,
            ]);

            $lastmod = $category->updated_at
                ? Carbon::parse($category->updated_at)->toAtomString()
                : null;

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars(
                    $loc,
                    ENT_XML1,
                    'UTF-8'
                )
                . '</loc>';

            if ($lastmod)
            {
                $xml .= '<lastmod>'
                    . htmlspecialchars(
                        $lastmod,
                        ENT_XML1,
                        'UTF-8'
                    )
                    . '</lastmod>';
            }

            $xml .= '<priority>0.80</priority>';

            $xml .= '</url>' . "\n";
        }

        // 3. PRODUCT SUBCATEGORIES: URL: /product/{category}/{subcategory}

        $subCategories = SubCategory::with('category')
            ->whereNull('deleted_at')
            ->whereNotNull('url')
            ->where('url', '!=', '')
            ->get();

        foreach ($subCategories as $subCategory)
        {
            if (!$subCategory->category || empty($subCategory->category->url))
            {
                continue;
            }

            $loc = route('productlist', [
                'category'    => $subCategory->category->url,
                'subcategory' => $subCategory->url,
            ]);

            $lastmod = $subCategory->updated_at
                ? Carbon::parse($subCategory->updated_at)->toAtomString()
                : null;

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars(
                    $loc,
                    ENT_XML1,
                    'UTF-8'
                )
                . '</loc>';

            if ($lastmod)
            {
                $xml .= '<lastmod>'
                    . htmlspecialchars(
                        $lastmod,
                        ENT_XML1,
                        'UTF-8'
                    )
                    . '</lastmod>';
            }

            $xml .= '<priority>0.80</priority>';

            $xml .= '</url>' . "\n";
        }

        // 4. PRODUCT PAGES: URL: /product/{category}/{subcategory}/{product}

        $products = Product::with(['category', 'subcategory'])
            ->whereNotNull('url')
            ->where('url', '!=', '')
            ->get();

        foreach ($products as $product)
        {
            $category = $product->category;
            $subcategory = $product->subcategory;

            if (!$category || !$subcategory)
            {
                continue;
            }

            if (empty($category->url) || empty($subcategory->url))
            {
                continue;
            }

            $loc = route('subproductlist', [
                'category'    => $category->url,
                'subcategory' => $subcategory->url,
                'product'     => $product->url,
            ]);

            $lastmod = $product->updated_at
                ? $product->updated_at->toAtomString()
                : null;

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';

            if ($lastmod)
            {
                $xml .= '<lastmod>'
                    . htmlspecialchars($lastmod, ENT_XML1, 'UTF-8')
                    . '</lastmod>';
            }

            $xml .= '<priority>0.80</priority>';

            $xml .= '</url>' . "\n";
        }

        // 5. PRODUCT DETAIL PAGES: URL: /product/{category}/{subcategory}/{product}/detail

        foreach ($products as $product)
        {
            $category = Category::find($product->category_id);
            $subcategory = SubCategory::find($product->subcategory_id);

            if (!$category || !$subcategory) {
                continue;
            }

            if (
                empty($category->url) ||
                empty($subcategory->url) ||
                empty($product->url)
            ) {
                continue;
            }

            $loc = route('productdetail', [
                'category'    => $category->url,
                'subcategory' => $subcategory->url,
                'product'     => $product->url,
            ]);

            $lastmod = $product->updated_at
                ? $product->updated_at->toAtomString()
                : null;

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';

            if ($lastmod)
            {
                $xml .= '<lastmod>'
                    . htmlspecialchars($lastmod, ENT_XML1, 'UTF-8')
                    . '</lastmod>';
            }

            $xml .= '<priority>0.80</priority>';

            $xml .= '</url>' . "\n";
        }

        // 6. SUBPRODUCT DETAIL PAGES: URL: /product/{category}/{subcategory}/{product}/{subproduct}/detail

        $subproducts = SubProduct::with([
            'category',
            'subcategory',
            'product'
        ])
            ->whereNotNull('url')
            ->where('url', '!=', '')
            ->get();

        foreach ($subproducts as $subproduct)
        {
            $category = $subproduct->category;
            $subcategory = $subproduct->subcategory;
            $product = $subproduct->product;

            if (!$category || !$subcategory || !$product)
            {
                continue;
            }

            if (empty($category->url) || empty($subcategory->url) || empty($product->url) || empty($subproduct->url))
            {
                continue;
            }

            $loc = route('subproductdetail', [
                'category'    => $category->url,
                'subcategory' => $subcategory->url,
                'product'     => $product->url,
                'subproduct'  => $subproduct->url,
            ]);

            $lastmod = $subproduct->updated_at
                ? $subproduct->updated_at->toAtomString()
                : null;

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';

            if ($lastmod)
            {
                $xml .= '<lastmod>'
                    . htmlspecialchars($lastmod, ENT_XML1, 'UTF-8')
                    . '</lastmod>';
            }

            $xml .= '<priority>0.80</priority>';

            $xml .= '</url>' . "\n";
        }

        // 7. STATIC FRONTEND PAGES

        $staticRoutes = [
            'about',
            'industries',
            'event',
            'news',
            'ourculture',
            'currentopportunities',
            'novacancy',
            'gallery',
            'faq',
            'contact',
            'milestone',
            'certifications',
            'our-agencies',
            'blog',
        ];

        foreach ($staticRoutes as $routeName)
        {
            try
            {
                $loc = route($routeName);
            } 
            catch (\Throwable $e)
            {
                continue;
            }

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars(
                    $loc,
                    ENT_XML1,
                    'UTF-8'
                )
                . '</loc>';

            $xml .= '<lastmod>'
                . Carbon::now()->toAtomString()
                . '</lastmod>';

            $xml .= '<priority>0.60</priority>';

            $xml .= '</url>' . "\n";
        }

        // 8. BLOGS

        $blogs = blog::whereNull('deleted_at')
            ->where('status', 'Active')
            ->whereNotNull('url')
            ->where('url', '!=', '')
            ->get();

        foreach ($blogs as $blog)
        {
            $loc = route('blogdetail', [
                'url' => $blog->url,
            ]);

            $lastmod = $blog->updated_at
                ? Carbon::parse($blog->updated_at)->toAtomString()
                : null;

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars(
                    $loc,
                    ENT_XML1,
                    'UTF-8'
                )
                . '</loc>';

            if ($lastmod)
            {
                $xml .= '<lastmod>'
                    . htmlspecialchars(
                        $lastmod,
                        ENT_XML1,
                        'UTF-8'
                    )
                    . '</lastmod>';
            }

            $xml .= '<priority>0.60</priority>';

            $xml .= '</url>' . "\n";
        }

        // END SITEMAP

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }
}