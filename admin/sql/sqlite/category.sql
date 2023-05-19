-- Categories

	-- get all categories 

	CREATE PROCEDURE getCategories(

		-- variables
		IN language_id INT,
		IN taxonomy_id INT,
		IN site_id INT,
		IN post_id INT,
		IN search CHAR,
		IN type CHAR,
		
		-- pagination
		IN start INT,
		IN limit INT,
			
		-- return array of categories for categories query
		OUT fetch_all,
		-- return categories count for count query
		OUT fetch_one,
	)
	BEGIN

		SELECT DISTINCT categories.taxonomy_item_id, categories.*, td.*, td.description as description, categories.taxonomy_item_id as array_key
			
				@IF isset(:post_id)
				THEN 
					,pt.post_id as checked  
				END @IF	
		
			FROM taxonomy_item AS categories
		
			INNER JOIN taxonomy_to_site t2s ON (categories.taxonomy_item_id = t2s.taxonomy_item_id AND t2s.site_id = :site_id) 
			INNER JOIN taxonomy_item_content td ON (categories.taxonomy_item_id = td.taxonomy_item_id AND td.language_id = :language_id)  
			INNER JOIN taxonomy t ON (categories.taxonomy_id = t.taxonomy_id)  
			
			@IF isset(:post_id) AND :type == "categories"
			THEN 
			
				-- LEFT JOIN post_to_taxonomy_item pt ON (categories.taxonomy_item_id = pt.taxonomy_item_id AND pt.post_id = :post_id)  
				
			END @IF				
			
			@IF isset(:post_id) AND :type == "tags"
			THEN 
			
				INNER JOIN post_to_taxonomy_item pt ON (categories.taxonomy_item_id = pt.taxonomy_item_id AND pt.post_id = :post_id)  
			@ELSE		
			
				LEFT JOIN post_to_taxonomy_item pt ON (categories.taxonomy_item_id = pt.taxonomy_item_id AND pt.post_id = :post_id)  
				
			END @IF	

			WHERE 
			
			td.language_id = :language_id AND t2s.site_id = :site_id

			@IF isset(:search)
			THEN 
			
				AND td.name LIKE :search
				
			END @IF	
			
			@IF isset(:type)
			THEN 
			
				AND t.type = :type 
				
			END @IF				
			
			@IF isset(:taxonomy_id)
			THEN 
			
				AND categories.taxonomy_id = :taxonomy_id
				
			END @IF			

		ORDER BY categories.parent_id, categories.sort_order, categories.taxonomy_item_id
		LIMIT :start, :limit;
		
		SELECT count(*) FROM (
			
			@SQL_COUNT(categories.taxonomy_item_id, taxonomy_item) -- this takes previous query removes limit and replaces select columns with parameter taxonomy_item_id
			
		) as count;


	END-- get all categories 
	
	CREATE PROCEDURE getCategoriesPages(

		-- variables
		IN language_id INT,
		IN taxonomy_id INT,
		IN site_id INT,
		IN post_id INT,
		IN search CHAR,
		IN type CHAR,
		
		-- pagination
		IN start INT,
		IN limit INT,
			
		-- return array of categories for categories query
		OUT affected_rows,
		-- return array of categories for categories query
		OUT fetch_all,
		-- return categories count for count query
		OUT fetch_one,
	)
	BEGIN
	
		SELECT DISTINCT categories.taxonomy_item_id, categories.*, td.*, td.description as description, categories.taxonomy_item_id as array_key
			
				@IF isset(:post_id)
				THEN 
					,pt.post_id as checked  
				END @IF	
			
			
			,(SELECT '[' || GROUP_CONCAT('{"post_id":"' || pc.post_id || '","slug":"' || pc.slug || '","sort_order":"' || p.sort_order || '","name":"' || pc.name || '"}') || ']' 
				FROM post_content pc 
					LEFT JOIN post p ON (pc.post_id = p.post_id)  
					LEFT JOIN post_to_taxonomy_item ptt ON (ptt.taxonomy_item_id = categories.taxonomy_item_id AND ptt.post_id = p.post_id)  
				WHERE ptt.taxonomy_item_id =  categories.taxonomy_item_id ORDER by p.sort_order
			) AS posts
		
			FROM taxonomy_item AS categories
		
			INNER JOIN taxonomy_to_site t2s ON (categories.taxonomy_item_id = t2s.taxonomy_item_id AND t2s.site_id = :site_id) 
			INNER JOIN taxonomy_item_content td ON (categories.taxonomy_item_id = td.taxonomy_item_id AND td.language_id = :language_id)  
			INNER JOIN taxonomy t ON (categories.taxonomy_id = t.taxonomy_id)  
			
			@IF isset(:post_id) AND :type == "categories"
			THEN 
			
				-- LEFT JOIN post_to_taxonomy_item pt ON (categories.taxonomy_item_id = pt.taxonomy_item_id AND pt.post_id = :post_id)  
				
			END @IF				
			
			@IF isset(:post_id) AND :type == "tags"
			THEN 
			
				INNER JOIN post_to_taxonomy_item pt ON (categories.taxonomy_item_id = pt.taxonomy_item_id AND pt.post_id = :post_id)  
			@ELSE		
			
				LEFT JOIN post_to_taxonomy_item pt ON (categories.taxonomy_item_id = pt.taxonomy_item_id AND pt.post_id = :post_id)  
				
			END @IF	

			WHERE 
			
			td.language_id = :language_id AND t2s.site_id = :site_id

			@IF isset(:search)
			THEN 
			
				AND td.name LIKE :search
				
			END @IF	
			
			@IF isset(:type)
			THEN 
			
				AND t.type = :type 
				
			END @IF				
			
			@IF isset(:taxonomy_id)
			THEN 
			
				AND categories.taxonomy_id = :taxonomy_id
				
			END @IF			

		ORDER BY categories.parent_id, categories.sort_order, categories.taxonomy_item_id
		LIMIT :start, :limit;
		
		SELECT count(*) FROM (
			
			@SQL_COUNT(categories.taxonomy_item_id, taxonomy_item) -- this takes previous query removes limit and replaces select columns with parameter taxonomy_item_id
			
		) as count;


	END-- get all categories 

	-- get one taxonomy_item

	CREATE PROCEDURE getCategory2(
		IN taxonomy_item_id INT,
		IN slug CHAR,
		OUT fetch_row, 
	)
	BEGIN
		-- taxonomy_item
		SELECT *
			FROM taxonomy_item as _ -- (underscore) _ means that data will be kept in main array
		WHERE taxonomy_item_id = :taxonomy_item_id LIMIT 1;

		--description
		SELECT *, language_id as _ -- (underscore) _ column means that this column (language_id) value will be used as array key when adding row to result array
			FROM taxonomy_item_content 
		WHERE taxonomy_item_id = :taxonomy_item_id;	 

		--images
		SELECT *, taxonomy_item_image_id  as _
			FROM taxonomy_item_image as images
		WHERE taxonomy_item_id = :taxonomy_item_id;	 

		 --SELECT *,taxonomy_item_option_id as _ 
			--FROM taxonomy_item_option  WHERE taxonomy_item_id = :taxonomy_item_id;
			--@EACH(taxonomy_item_option, taxonomy_item_option_value) 
				--SELECT *, taxonomy_item_option_value_id as _ FROM taxonomy_item_option_value pov 
					--WHERE taxonomy_item_option_id = :taxonomy_item_option[taxonomy_item_option_id];

	END	
	
	CREATE PROCEDURE getCategoryBySlug(
		IN taxonomy_item_id INT,
		IN parent_id INT,
		IN slug CHAR,
		OUT fetch_row, 
	)
	BEGIN
	
		--description
		SELECT * -- (underscore) _ column means that this column (language_id) value will be used as array key when adding row to result array
			FROM taxonomy_item_content AS _
			LEFT JOIN taxonomy_item as t ON (_.taxonomy_item_id = t.taxonomy_item_id)  
		WHERE 1 = 1

		@IF isset(:taxonomy_item_id)
		THEN 
		
			AND _.taxonomy_item_id = :taxonomy_item_id
			
		END @IF			
		
		@IF isset(:slug)
		THEN 
		
			AND slug = :slug
			
		END @IF		
		
		@IF isset(:slug)
		THEN 
		
			AND parent_id = :parent_id
			
		END @IF
		
		LIMIT 1;
		
		-- images
		-- SELECT *, taxonomy_item_image_id  as _
		--	FROM taxonomy_item_image as images
		-- WHERE taxonomy_item_id = :taxonomy_item_id;	 

		 -- SELECT *,taxonomy_item_option_id as _ 
			-- FROM taxonomy_item_option  WHERE taxonomy_item_id = :taxonomy_item_id;
			-- @EACH(taxonomy_item_option, taxonomy_item_option_value) 
				-- SELECT *, taxonomy_item_option_value_id as _ FROM taxonomy_item_option_value pov 
					-- WHERE taxonomy_item_option_id = :taxonomy_item_option[taxonomy_item_option_id];

	END
	



	-- Edit taxonomy_item

	CREATE PROCEDURE editCategory(
		IN taxonomy_item_array ARRAY,
		IN  taxonomy_item_id INT,
		OUT insert_id
	)
	BEGIN

		DELETE FROM taxonomy_item_content WHERE taxonomy_item_id = :taxonomy_item_id;
		
		
		@EACH(:taxonomy_item_array.taxonomy_item_content) 
			INSERT INTO taxonomy_item_content 
		
				( @KEYS(:each), taxonomy_item_id, meta_title, meta_description, meta_keyword )
			
			VALUES ( :each, :taxonomy_item_id, '', '', '' );


		--SELECT * FROM taxonomy_item_option WHERE taxonomy_item_id = :taxonomy_item_id;

		-- allow only table fields and set defaults for missing values
		@FILTER(:taxonomy_item_array, taxonomy_item);
		
		UPDATE taxonomy_item 
			
			SET @LIST(:taxonomy_item_array) 
			
		WHERE taxonomy_item_id = :taxonomy_item_id
	END	



-- Add new taxonomy_item

	CREATE PROCEDURE addCategory(
		IN taxonomy_item ARRAY,
		IN taxonomy_item_content ARRAY,
		IN site_id INT,
		OUT insert_id
	)
	BEGIN
		
		-- allow only table fields and set defaults for missing values
		:taxonomy_item  = @FILTER(:taxonomy_item, taxonomy_item);
		:taxonomy_item_content = @FILTER(:taxonomy_item_content, taxonomy_item_content);

		INSERT INTO taxonomy_item 
		
			( @KEYS(:taxonomy_item) )
			
		VALUES ( :taxonomy_item );
			

		-- SET :taxonomy_item_content.taxonomy_item_id = last_insert_id;
       --  SET @taxonomy_item_id = LAST_INSERT_ID();

		-- UPDATE taxonomy_item SET image = :image WHERE taxonomy_item_id = :taxonomy_item_id;
		
		-- :taxonomy_item  = @FILTER(:taxonomy_item, taxonomy_item);
		
		INSERT INTO taxonomy_item_content 
		
			( `taxonomy_item_id`, @KEYS(:taxonomy_item_content) )
			
		VALUES ( @result.taxonomy_item, :taxonomy_item_content );
		
		
		INSERT INTO taxonomy_to_site 
		
			( `taxonomy_item_id`, `site_id` )
			
		VALUES ( @result.taxonomy_item, :site_id );
		
	 
        SELECT @taxonomy_item_id as taxonomy_item_id;
	END


	
	CREATE PROCEDURE getCategoriesAllLanguages(

		-- variables
		IN language_id INT,
		IN user_group_id INT,
		IN site_id INT,
		IN taxonomy_id INT,
		IN search CHAR,
		
		-- pagination
		IN start INT,
		IN limit INT,
			
		-- return array of categories for categories query
		OUT fetch_all,
		-- return categories count for count query
		OUT fetch_one,
	)
	BEGIN

		SELECT *, 
			(
				SELECT 
					'[' || GROUP_CONCAT(
					'{"language_id":"' || cd.language_id, 
						'","name":"' || cd.name, 
						'","slug":"' || cd.slug, 
						'","description":"' || cd.description, 
						'","meta_title":"' ||  cd.meta_title, 
						'","meta_description":"' || cd.meta_description, 
						'","meta_keyword":"' || cd.meta_keyword || '"}') || ']') 
						
					FROM taxonomy_item_content as cd 
				WHERE 
					cd.taxonomy_item_id = categories.taxonomy_item_id GROUP BY cd.taxonomy_item_id
			) as languages
			
			FROM taxonomy_item AS categories
		
				LEFT JOIN taxonomy_to_site t2s ON (categories.taxonomy_item_id = t2s.taxonomy_item_id) 

			WHERE 
			
			t2s.site_id = :site_id

			@IF isset(:search)
			THEN 
			
				AND td.name LIKE :search
				
			END @IF						
			
			@IF isset(:taxonomy_id)
			THEN 
			
				AND categories.taxonomy_id LIKE :taxonomy_id
				
			END @IF	
			
			@IF isset(:type)
			THEN 
			
				AND categories.type LIKE :type
				
			END @IF				
			
			@IF isset(:post_type)
			THEN 
			
				AND categories.post_type LIKE :post_type
				
			END @IF			

		ORDER BY categories.parent_id, categories.sort_order, categories.taxonomy_item_id
		LIMIT :start, :limit;
		
		SELECT count(*) FROM (
			
			@SQL_COUNT(categories.taxonomy_item_id, taxonomy_item) -- this takes previous query removes limit and replaces select columns with parameter product_id
			
		) as count;


	END




	-- Edit menu

	CREATE PROCEDURE editTaxonomyItem(
		IN taxonomy_item ARRAY,
		IN  taxonomy_item_id INT,
		OUT insert_id
	)
	BEGIN

		-- allow only table fields and set defaults for missing values
		:taxonomy_item_content_data = @FILTER(:taxonomy_item.taxonomy_item_content, taxonomy_item_content);

		@EACH(:taxonomy_item_content_data) 
			INSERT INTO taxonomy_item_content 
		
				( @KEYS(:each), taxonomy_item_id)
			
			VALUES ( :each, :taxonomy_item_id)
				ON DUPLICATE KEY UPDATE @LIST(:each);

		-- allow only table fields and set defaults for missing values
		@FILTER(:taxonomy_item, taxonomy_item);
		
		UPDATE taxonomy_item 
			
			SET @LIST(:taxonomy_item) 
			
		WHERE taxonomy_item_id = :taxonomy_item_id;
	END	



	-- Add new menu

	CREATE PROCEDURE addTaxonomyItem(
		IN taxonomy_item ARRAY,
		IN site_id INT,
		OUT insert_id
	)
	BEGIN
		
		-- allow only table fields and set defaults for missing values
		:taxonomy_item_content_data = @FILTER(:taxonomy_item.taxonomy_item_content, taxonomy_item_content);
		:taxonomy_item_data  = @FILTER(:taxonomy_item, taxonomy_item);
		
		INSERT INTO taxonomy_item 
		
			( @KEYS(:taxonomy_item_data) )
			
		VALUES ( :taxonomy_item_data );
			

		INSERT INTO taxonomy_to_site 
		
			( `taxonomy_item_id` , `site_id` )
			
		VALUES ( @result.taxonomy_item, :site_id );		
		
		@EACH(:taxonomy_item_content_data) 
			INSERT INTO taxonomy_item_content 
		
				( `taxonomy_item_id`, @KEYS(:each) )
			
			VALUES ( @result.taxonomy_item, :each );
			
	 
        SELECT @taxonomy_item as taxonomy_item;
	END

	-- Reorder menu items

	CREATE PROCEDURE updateTaxonomyItems(
		IN taxonomy_items ARRAY,
		OUT insert_id
	)
	BEGIN
		
		:taxonomy_item_data  = @FILTER(:taxonomy_items, taxonomy_item);
		
		@EACH(:taxonomy_item_data) 
			UPDATE taxonomy_item
			
				SET @LIST(:each) 
			
			WHERE taxonomy_item_id = :each.taxonomy_item_id;
		
	END	
	
	-- Delete menu item

	CREATE PROCEDURE deleteTaxonomyItem(
		IN taxonomy_item_id INT,
		OUT insert_id
	)
	BEGIN
	
		-- delete taxonomy_item_content
		DELETE FROM `taxonomy_item_content` WHERE taxonomy_item_id IN (
		WITH RECURSIVE tree AS ( 
				   SELECT taxonomy_item_id, 
					  parent_id
				   FROM taxonomy_item
				   WHERE taxonomy_item_id = :taxonomy_item_id

				   UNION ALL 

				   SELECT p.taxonomy_item_id,
						  p.parent_id 
				   FROM taxonomy_item p
					 JOIN tree t ON t.taxonomy_item_id = p.parent_id
				)
		SELECT taxonomy_item_id FROM tree);
		
		-- delete taxonomy_item
		DELETE FROM `taxonomy_item` WHERE taxonomy_item_id IN (
		WITH RECURSIVE tree AS ( 
				   SELECT taxonomy_item_id, 
					  parent_id
				   FROM taxonomy_item
				   WHERE taxonomy_item_id = :taxonomy_item_id

				   UNION ALL 

				   SELECT p.taxonomy_item_id,
						  p.parent_id 
				   FROM taxonomy_item p
					 JOIN tree t ON t.taxonomy_item_id = p.parent_id
				)
		SELECT taxonomy_item_id FROM tree);
		
	END