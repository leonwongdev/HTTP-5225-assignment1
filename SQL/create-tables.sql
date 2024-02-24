-- Create Category table
CREATE TABLE Category (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Create Channel table
CREATE TABLE Channel (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    youtube_url VARCHAR(255), -- New field for YouTube URL
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES Category(id)
);

-- Insert sample categories
INSERT INTO Category (id, name)
VALUES
    (1, 'Mobile App Development'),
    (2, 'Web Development'),
    (3, 'Data Science'),
    (4, 'Machine Learning'),
    (5, 'Software Engineering');

-- Insert sample channels
INSERT INTO Channel (id, name, description, youtube_url, category_id)
VALUES
    (1, 'Traversy Media', 'Web development tutorials and courses.', 'https://www.youtube.com/user/TechGuyWeb', 2),
    (2, 'CodeEmporium', 'Programming and software development content.', 'https://www.youtube.com/c/CodeEmporium', 5),
    (3, 'Data School', 'Data science and Python tutorials.', 'https://www.youtube.com/user/dataschool', 3),
    (4, 'deeplizard', 'Deep learning and artificial intelligence.', 'https://www.youtube.com/c/deeplizard', 4),
    (5, 'freeCodeCamp.org', 'Learn to code for free.', 'https://www.youtube.com/c/Freecodecamp', 5);
