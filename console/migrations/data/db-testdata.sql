/* ================================ Template Blog ============================================== */

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

SET FOREIGN_KEY_CHECKS=1;