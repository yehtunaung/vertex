CREATE TABLE `customers` (
  `id` integer PRIMARY KEY,
  `name` varchar(255),
  `email` varchar(255),
  `NRC` varchar(255),
  `contact_no` integer,
  `gender` varchar(255),
  `address` varchar(255),
  `status` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp,
  `deleted_at` timestamp
);

CREATE TABLE `room_categories` (
  `id` integer PRIMARY KEY,
  `room_type` varchar(255),
  `room_img` varchar(255),
  `description` longtext,
  `cost` varchar(255),
  `status` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp,
  `deleted_at` timestamp
);

CREATE TABLE `rooms` (
  `id` integer PRIMARY KEY,
  `room_categories_id` integer,
  `room_no` varchar(255),
  `description` longtext,
  `item_id` integer,
  `total_price` varchar(255),
  `status` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp,
  `deleted_at` timestamp
);

CREATE TABLE `bookings` (
  `id` integer PRIMARY KEY,
  `room_id` integer,
  `customer_id` integer,
  `bookingdate` date,
  `check_in_time` datetime,
  `check_out_time` datetime,
  `status` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp,
  `deleted_at` timestamp
);

CREATE TABLE `currencies` (
  `id` integer PRIMARY KEY,
  `currency_name` varchar(255),
  `rate` integer,
  `remark` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp,
  `deleted_at` timestamp
);

CREATE TABLE `employees` (
  `id` integer PRIMARY KEY,
  `employees_fname` varchar(255),
  `employees_lname` varchar(255),
  `contact_no` integer,
  `address` text,
  `roles` varchar(255),
  `username` varchar(255),
  `password` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp,
  `deleted_at` timestamp
);

CREATE TABLE `payments` (
  `id` integer PRIMARY KEY,
  `payment_type` integer,
  `customer_id` integer,
  `created_at` timestamp,
  `updated_at` timestamp,
  `deleted_at` timestamp
);

CREATE TABLE `transcations` (
  `id` integer PRIMARY KEY,
  `transcation_name` varchar(255),
  `payment_id` integer,
  `booking_id` integer,
  `created_at` timestamp,
  `updated_at` timestamp,
  `deleted_at` timestamp
);

CREATE TABLE `items` (
  `id` integer PRIMARY KEY,
  `item_name` varchar(255),
  `price` varchar(255),
  `count` integer,
  `created_at` timestamp,
  `updated_at` timestamp,
  `deleted_at` timestamp
);

ALTER TABLE `rooms` ADD FOREIGN KEY (`room_categories_id`) REFERENCES `room_categories` (`id`);

ALTER TABLE `bookings` ADD FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

ALTER TABLE `bookings` ADD FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

ALTER TABLE `customers` ADD FOREIGN KEY (`id`) REFERENCES `payments` (`customer_id`);

ALTER TABLE `payments` ADD FOREIGN KEY (`id`) REFERENCES `transcations` (`payment_id`);

ALTER TABLE `bookings` ADD FOREIGN KEY (`id`) REFERENCES `transcations` (`booking_id`);

ALTER TABLE `rooms` ADD FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);
