CREATE TABLE `employee` (
  `emp_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phn_no` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL,
  `jointime` timestamp NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `department` (
	`d_no` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	`d_name` varchar(255) NOT NULL,
	`faculty` varchar(255) NOT NULL

)ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `facultymember` (
	`fact_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	 `emp_id` int(11) DEFAULT NULL,
	 `d_no` int(11) DEFAULT NULL,
	 `designation` varchar(255) NOT NULL,
	 FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
	 FOREIGN KEY (`d_no`) REFERENCES `department` (`d_no`) ON DELETE CASCADE ON UPDATE CASCADE

)ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `adminstration` (
`admin_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`emp_id` int(11) DEFAULT NULL,
`section` varchar(255) NOT NULL,
`designation` varchar(255) NOT NULL,
 FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE


)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `staff` (
`staff_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`emp_id` int(11) DEFAULT NULL,
`section` varchar(255) NOT NULL,
`department` varchar(255) NOT NULL,
`designation` varchar(255) NOT NULL,
 FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE 

)ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `project` (
`p_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` varchar(255) NOT NULL,
`fact_id` int(11) DEFAULT NULL,
`duration` varchar(255) NOT NULL,
 FOREIGN KEY (`fact_id`) REFERENCES `facultymember` (`fact_id`) ON DELETE CASCADE ON UPDATE CASCADE

)ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `course` (
`course_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`course_name` varchar(255) NOT NULL,
`fact_id` int(11) DEFAULT NULL,
`d_no` int(11) DEFAULT NULL,
 FOREIGN KEY (`fact_id`) REFERENCES `facultymember` (`fact_id`) ON DELETE CASCADE ON UPDATE CASCADE,
 FOREIGN KEY (`d_no`) REFERENCES `department` (`d_no`) ON DELETE CASCADE ON UPDATE CASCADE

)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `training` (
`tr_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`training_name` varchar(255) NOT NULL,
`emp_id` int(11) DEFAULT NULL,
`duration` varchar(255) NOT NULL,
 FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE

)ENGINE=InnoDB DEFAULT CHARSET=latin1;