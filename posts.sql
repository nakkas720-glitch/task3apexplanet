CREATE DATABASE blog_db;
USE blog_db;

CREATE TABLE posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  content TEXT
);

INSERT INTO posts (title, content) VALUES
('PHP Basics', 'Learn the basics of PHP programming.'),
('HTML Introduction', 'HTML is the structure of a web page.'),
('CSS Styling', 'CSS makes your page beautiful.'),
('Bootstrap Framework', 'Bootstrap helps with responsive design.'),
('Pagination in PHP', 'How to implement pagination in PHP.');
