=== Fand Product Customizer ===
Contributors:       fandevelop
Donate link:        https://fan-develop.fr
Tags:               woocommerce, product customizer, personalization, custom text, font
Requires at least:  6.8
Tested up to:       7.0
Requires PHP:       7.4
Stable tag:         1.0.0
License:            GPL-2.0-or-later
License URI:        https://www.gnu.org/licenses/gpl-2.0.html

Add a text personalization block to your WooCommerce product pages. Let your customers choose a custom text and font, saved directly in the order.

== Description ==

**Fand Product Customizer** adds a Gutenberg block to your WooCommerce product pages that allows customers to personalize their order with a custom text and a font of their choice.

The block is fully dynamic (server-side rendered) and integrates natively with WooCommerce: the chosen text and font are displayed in the cart, in the order summary, and saved in the order details in the back office.

**Key features:**

**Customer-facing features (front end):**

* Personalization block insertable in any WooCommerce single product template
* Text input field with configurable character limit (default: 15 characters)
* Live preview of the text rendered in the selected font, in real time
* Font selector showing only the fonts enabled for that product
* Validation on form submit : prevents adding to cart without a text entry

**Store owner features (back end):**

* Enable or disable the personalization block per product with a simple checkbox
* Choose which fonts are available for each product individually
* Fonts managed natively via the WordPress font library (Appearance > Editor > Styles > Fonts) — no external dependency
* Chosen text and font displayed in the cart under the product name
* Chosen text and font displayed in the order confirmation summary
* Chosen text and font saved in the order detail in the WooCommerce back office
* No coding required : fully configurable via the WordPress admin

== Installation ==

= Step 1 : Install and activate the plugin =

1. Upload the `fand-product-customizer` folder to the `/wp-content/plugins/` directory, or install it directly via the WordPress plugin screen (**Plugins > Add New**).
2. Activate the plugin via the **Plugins** screen in WordPress.

= Step 2 : Add fonts via the WordPress font library =

The plugin uses fonts registered natively in WordPress (introduced in WordPress 6.5).

1. Go to **Appearance > Editor**.
2. Click the **Styles** icon (top right), then **Fonts**.
3. Upload or add the fonts you want to offer your customers (e.g. Love, Cardenio Modern, etc.).
4. Once added, the fonts will automatically appear in the plugin's font selector.

= Step 3 : Insert the block in the single product template =

1. Go to **Appearance > Editor > Templates**.
2. Open the **Single Product** template.
3. Click the **+** button to add a block and search for **Fand Product Customizer**.
4. Insert the block where you want it to appear on the product page (recommended: between the product excerpt and the Add to Cart button).
5. Save the template.

**Note:** This step requires a Full Site Editing (FSE) compatible theme (such as Twenty Twenty-Four, Twenty Twenty-Five, or any block-based theme). If your theme does not support FSE, the block remains available in the classic Gutenberg editor — you can insert it directly in the product description or via a custom template using a page builder that supports blocks. In all cases, the block must be placed inside or alongside the WooCommerce Add to Cart form to ensure the personalization data is correctly submitted with the order.

= Step 4 : Enable the block on each product =

The block will only be displayed on products where it has been explicitly enabled.

1. Go to **Products** and open the product you want to configure.
2. In the **Product data** panel, go to the **General** tab.
3. Check **Activate personalization**.
4. Save the product.

= Step 5 : Choose available fonts per product =

Each product can offer a different set of fonts to the customer.

1. On the product edit screen, find the **Available fonts for this product** meta box in the right sidebar.
2. Check the fonts you want to offer for this specific product.
3. Save the product.

The font selector displayed to the customer will only show the fonts you have checked for that product.

= How it works on the front end =

Once configured, customers visiting the product page will see a personalization block with:

* A text input field (max 15 characters)
* A live preview area showing the text rendered in the selected font in real time
* A font selector showing only the fonts enabled for that product

When the customer adds the product to the cart, the chosen text and font are attached to the cart item and displayed in:

* The **cart page** (under the product name)
* The **checkout order summary**
* The **order confirmation page**
* The **order detail in the back office** (under the product line)

This allows you to see at a glance, for each order, the exact personalization requested by the customer (text and font).

== Frequently Asked Questions ==

= Does it work with any WooCommerce theme? =

Yes, as long as your theme supports the WordPress block editor (FSE themes such as Twenty Twenty-Four, Twenty Twenty-Five, Storefront Block, etc.). The block is inserted in the Single Product template via the Site Editor.

= Can I offer different fonts for different products? =

Yes. Each product has its own selection of fonts. You can offer X fonts on one product and Y completely different fonts on another.

= Where do I add fonts? =

Fonts are managed natively in WordPress via **Appearance > Editor > Styles > Fonts**. Any font you add there will automatically become available in the plugin's font selector.

= Is the customer's personalization saved in the order? =

Yes. The chosen text and font are saved as order item meta data. They appear in the cart, in the order confirmation email, and in the order detail in the WooCommerce back office.

= Can I limit the number of characters? =

In the current version, the limit is set to 15 characters. This will be configurable per product in a future Pro version.

== Screenshots ==

1. Personalization block displayed on the product page with live font preview.
2. Font selection in the Available fonts meta box on the product edit screen.
3. Personalization checkbox in the General tab of product data.
4. Personalization (text + font) displayed in the cart under the product name.
5. Order detail in the back office showing the customer's personalization.

== Source Code ==

This plugin uses npm and webpack to compile JavaScript and CSS assets.
The full source code is publicly available on GitHub:

https://github.com/Florence-Androlus/fand-product-customizer

To rebuild the assets from source:

1. Clone the repository
2. Run `npm install`
3. Run `npm run build`

== Changelog ==

= 1.0.0 =
* Initial release.
* Gutenberg block with live text and font preview.
* Native WordPress font library integration.
* Per-product enable/disable checkbox.
* Per-product font selection meta box.
* Cart, order summary and back-office order detail integration.

== Upgrade Notice ==

= 1.0.0 =
Initial release.