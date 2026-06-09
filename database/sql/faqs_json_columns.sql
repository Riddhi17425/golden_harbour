ALTER TABLE `category`
  ADD COLUMN `faqs` JSON NULL AFTER `meta_description`;

ALTER TABLE `subcategory`
  ADD COLUMN `faqs` JSON NULL AFTER `meta_description`;

ALTER TABLE `product`
  ADD COLUMN `faqs` JSON NULL AFTER `meta_description`;

ALTER TABLE `subproduct`
  ADD COLUMN `faqs` JSON NULL AFTER `meta_description`;
