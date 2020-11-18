# We need to create 4 tables in our database named users, posts, topics and post_topic.

users :

CREATE TABLE `users` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Author','Admin') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
);

and insert this in users :

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Awa', 'info@xyz.com', 'Admin', 'mypassword', '2018-01-08 12:52:58', '2018-01-08 12:52:58')



posts :

CREATE TABLE `posts` (
 `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `user_id` int(11) DEFAULT NULL,
 `title` varchar(255) NOT NULL,
 `slug` varchar(255) NOT NULL UNIQUE,
 `views` int(11) NOT NULL DEFAULT '0',
 `image` varchar(255) NOT NULL,
 `body` text NOT NULL,
 `published` tinyint(1) NOT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 `updated_at` timestamp DEFAULT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

and insert this in posts :

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `views`, `image`, `body`, `published`, `created_at`, `updated_at`) VALUES
(1, 1, '5 Habits that can improve your life', '5-habits-that-can-improve-your-life', 0, 'banner.jpg', 'Read every day', 1, '2018-02-03 07:58:02', '2018-02-01 19:14:31'),
(2, 1, 'Second post on LifeBlog', 'second-post-on-lifeblog', 0, 'banner.jpg', 'This is the body of the second post on this site', 0, '2018-02-02 11:40:14', '2018-02-01 13:04:36')


topics :

CREATE TABLE `topics` (
 `id` int(11) NOT NULL,
 `name` varchar(255) NOT NULL,
 `slug` varchar(255) NOT NULL UNIQUE
 );
 
CREATE TABLE `post_topic` (
 `id` int(11) NOT NULL,
 `post_id` int(11) NOT NULL UNIQUE,
 `topic_id` int(11) NOT NULL 
 );
 
Click/select the post_topic table, then click on the structure tab of the PHPMyAdmin navbar. Next, click on Relation View just underneath the structure tab (it could be found somewhere else depending on your version of PHPMyAdmin).
 
ON DELETE and ON UPDATE are all set to CASCADE and NO ACTION respectively so that when a post or a topic is deleted, it's relationship info in the post_topic table is automatically deleted too. (In the image I made a mistake of setting ON UPDATE to CASCADE instead of NO ACTION, sorry for that).

then insert this into topics :


INSERT INTO `topics` (`id`, `name`, `slug`) VALUES
(1, 'Inspiration', 'inspiration'),
(2, 'Motivation', 'motivation'),
(3, 'Diary', 'diary')


then insert this into post_topic :
INSERT INTO `post_topic` (`id`, `post_id`, `topic_id`) VALUES
(1, 1, 1),
(2, 2, 2)

The relationship defined on the post_topic table says that the topic with id 1 on the topics table belongs to the post with id 1 on the posts table. The same holds true for the topic with id 2 and post with id 2.
