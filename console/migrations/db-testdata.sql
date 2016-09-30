SET FOREIGN_KEY_CHECKS=0;

--
-- Main Site
--

SELECT @site := `id` FROM cmg_core_site WHERE slug = 'main';

--
-- Contact Form
--

INSERT INTO `cmg_core_form` (`siteId`,`templateId`,`createdBy`,`modifiedBy`,`name`,`slug`,`type`,`description`,`successMessage`,`captcha`,`visibility`,`active`,`userMail`,`adminMail`,`createdAt`,`modifiedAt`,`htmlOptions`,`data`) VALUES
	(@site,1,1,1,'Contact Us','contact-us','site','contact form','Contrary to popular belief, Lorem Ipsum is not simply random text.',1,0,1,0,1,'2014-10-11 14:22:54','2014-10-11 14:22:54',NULL,NULL);

SELECT @form := `id` FROM cmg_core_form WHERE slug = 'contact-us';

INSERT INTO `cmg_core_form_field` (`formId`,`name`,`label`,`type`,`compress`,`validators`,`order`,`htmlOptions`,`data`) VALUES 
	(@form,'name','Name',0,0,'required',0,'{\"placeholder\":\"Name\"}',NULL),
	(@form,'email','Email',0,0,'required,email',0,'{\"placeholder\":\"Email\"}',NULL),
	(@form,'subject','Subject',0,0,'required',0,'{\"placeholder\":\"Subject\"}',NULL),
	(@form,'message','Message',10,0,NULL,0,'{\"placeholder\":\"Message\"}',NULL);

--
-- Feedback Form
--

INSERT INTO `cmg_core_form` (`siteId`,`templateId`,`createdBy`,`modifiedBy`,`name`,`slug`,`type`,`description`,`successMessage`,`captcha`,`visibility`,`active`,`userMail`,`adminMail`,`createdAt`,`modifiedAt`,`htmlOptions`,`data`) VALUES
	(@site,1,1,1,'Feedback','feedback','site','feedback form','Thanks for providing your valuable feedback.',1,0,1,0,1,'2014-10-11 14:22:54','2014-10-11 14:22:54',NULL,NULL);

SELECT @form := `id` FROM cmg_core_form WHERE slug = 'feedback';

INSERT INTO `cmg_core_form_field` (`formId`,`name`,`label`,`type`,`compress`,`validators`,`order`,`htmlOptions`,`data`) VALUES 
	(@form,'name','Name',0,0,'required',0,'{\"placeholder\":\"Name\"}',NULL),
	(@form,'email','Email',0,0,'required,email',0,'{\"placeholder\":\"Email\"}',NULL),
	(@form,'message','Message',10,0,NULL,0,'{\"placeholder\":\"Message\"}',NULL),
	(@form,'rating','Rating',90,0,'required',0,'{\"placeholder\":\"Rating\"}',NULL);

--
-- Default Gallery
--

INSERT INTO `cmg_core_file` VALUES 
	(1,1,1,'Item 1','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....','4f9dd9e0a7471181b4b7a4729407d96a','jpg','gallery',0.5,0,NULL,'2015-08-16/gallery/4f9dd9e0a7471181b4b7a4729407d96a.jpg',NULL,'2015-08-16/gallery/4f9dd9e0a7471181b4b7a4729407d96a-thumb.jpg','Item 1','',0,'2015-08-16 16:50:28','2015-08-16 16:50:28'),
	(2,1,1,'Item 2','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....','925e82814e15d5e9832c74f75e594418','JPG','gallery',0.5,0,NULL,'2015-08-16/gallery/925e82814e15d5e9832c74f75e594418.JPG',NULL,'2015-08-16/gallery/925e82814e15d5e9832c74f75e594418-thumb.JPG','Item 2','',0,'2015-08-16 16:50:50','2015-08-16 16:50:50'),
	(3,1,1,'Item 3','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....','ec7435a559fff465d91e1e959f025942','JPG','gallery',0.5,0,NULL,'2015-08-16/gallery/ec7435a559fff465d91e1e959f025942.JPG',NULL,'2015-08-16/gallery/ec7435a559fff465d91e1e959f025942-thumb.JPG','Item 3','',0,'2015-08-16 16:51:04','2015-08-16 16:51:04'),
	(4,1,1,'Item 4','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....','d998309764ae3d095760bb152098b0f5','jpg','gallery',0.5,0,NULL,'2015-08-16/gallery/d998309764ae3d095760bb152098b0f5.jpg',NULL,'2015-08-16/gallery/d998309764ae3d095760bb152098b0f5-thumb.jpg','Item 4','',0,'2015-08-16 16:51:22','2015-08-16 16:51:22'),
	(5,1,1,'Item 5','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....','ea69dce0c8624a6b4b761243ef5975d7','JPG','gallery',0.5,0,NULL,'2015-08-16/gallery/ea69dce0c8624a6b4b761243ef5975d7.JPG',NULL,'2015-08-16/gallery/ea69dce0c8624a6b4b761243ef5975d7-thumb.JPG','Item 5','',0,'2015-08-16 16:51:44','2015-08-16 16:52:12'),
	(6,1,1,'Item 6','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....','d2935c354804cd46b07c03f0f06db069','jpg','gallery',0.5,0,NULL,'2015-08-16/gallery/d2935c354804cd46b07c03f0f06db069.jpg',NULL,'2015-08-16/gallery/d2935c354804cd46b07c03f0f06db069-thumb.jpg','Item 6','',0,'2015-08-16 16:52:40','2015-08-16 16:52:40');

INSERT INTO `cmg_core_gallery` (`siteId`,`createdBy`,`modifiedBy`,`name`,`slug`,`type`,`title`,`description`,`active`,`createdAt`,`modifiedAt`) VALUES 
	(@site,1,1,'main','main','system','About Us','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,'2015-08-16 16:48:32','2015-08-16 16:48:32');

INSERT INTO `cmg_core_model_file` VALUES 
	(1,1,1,'gallery',0,1),
	(2,2,1,'gallery',0,1),
	(3,3,1,'gallery',0,1),
	(4,4,1,'gallery',0,1),
	(5,5,1,'gallery',0,1),
	(6,6,1,'gallery',0,1);

SET FOREIGN_KEY_CHECKS=1;