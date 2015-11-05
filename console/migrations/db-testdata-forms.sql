/* ================================ Template Basic ============================================== */

SET FOREIGN_KEY_CHECKS=0;

--
-- Dumping data for table `cmg_form`
--

INSERT INTO `cmg_form` VALUES 
	(1,NULL,1,1,'Contact Us','contact-us','contact form','Thanks for contacting us. We will contact you within next 48 hrs.',1,1,0,0,1,NULL,'2014-10-11 14:22:54','2014-10-11 14:22:54'),
	(2,NULL,1,1,'Feedback','feedback','feedback form','Thanks for providing your valuable feedback.',0,1,1,0,1,NULL,'2014-10-11 14:22:54','2014-10-11 14:22:54');

--
-- Dumping data for table `cmg_form_field`
--

INSERT INTO `cmg_form_field` VALUES 
	(1,1,'name',NULL,1,'required','{\"placeholder\":\"Name\"}',NULL),
	(2,1,'email',NULL,1,'required,email','{\"placeholder\":\"Email\"}',NULL),
	(3,1,'subject',NULL,1,'required','{\"placeholder\":\"Subject\"}',NULL),
	(4,1,'message',NULL,5,NULL,'{\"placeholder\":\"Message\"}',NULL),
	(5,2,'name',NULL,1,'required','{\"placeholder\":\"Name\"}',NULL),
	(6,2,'email',NULL,1,'required,email','{\"placeholder\":\"Email\"}',NULL),
	(7,2,'rating',NULL,25,'required','{\"placeholder\":\"Subject\"}',NULL),
	(8,2,'message',NULL,5,NULL,'{\"placeholder\":\"Message\"}',NULL);
	
--
-- Update Form Templates
--
UPDATE cmg_form set templateId=1 where id in (1,2);

SET FOREIGN_KEY_CHECKS=1;