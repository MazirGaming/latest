DROP TABLE IF EXISTS product_to_category;
CREATE TABLE product_to_category (
  "product_id" int check ("product_id" > 0) NOT NULL,
  "taxonomy_item_id" int check ("taxonomy_item_id" > 0) NOT NULL,
  PRIMARY KEY ("product_id","taxonomy_item_id")
);

CREATE INDEX "product_to_category_taxonomy_item_id" ON product_to_category ("taxonomy_item_id");