CREATE DATABASE social_media;
USE social_media;

-- Users Table
CREATE TABLE users (
    user_id       INT AUTO_INCREMENT PRIMARY KEY,
    first_name    VARCHAR(50) NOT NULL,
    last_name     VARCHAR(50) NOT NULL,
    username      VARCHAR(50) UNIQUE NOT NULL,
    email         VARCHAR(100) UNIQUE NOT NULL,
    password      VARCHAR(255) NOT NULL,  -- Store hashed password
    dob           DATE NOT NULL,
    profile_pic   VARCHAR(255) DEFAULT NULL, -- Path to profile picture
    created_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Privacy Settings Table
CREATE TABLE privacy_settings (
    user_id      INT PRIMARY KEY,
    is_private   BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Security Settings Table
CREATE TABLE security_settings (
    user_id           INT PRIMARY KEY,
    mobile_no        VARCHAR(15) UNIQUE DEFAULT NULL,
    two_step_enabled BOOLEAN DEFAULT FALSE, -- Indicates if 2FA is enabled
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);


-- Posts Table
CREATE TABLE posts (
    post_id      INT AUTO_INCREMENT PRIMARY KEY,
    user_id      INT NOT NULL,
    caption      TEXT DEFAULT NULL,
    image_url    VARCHAR(255) DEFAULT NULL,  -- Store image path
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Thoughts Table (Similar to Instagram Story, expires in 24hrs)
CREATE TABLE thoughts (
    thought_id   INT AUTO_INCREMENT PRIMARY KEY,
    user_id      INT NOT NULL,
    text_content TEXT DEFAULT NULL,  -- Thought text
    media_url    VARCHAR(255) DEFAULT NULL,  -- Optional media
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    expires_at   TIMESTAMP DEFAULT (CURRENT_TIMESTAMP + INTERVAL 1 DAY), -- Auto-expire after 24 hours
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Likes Table
CREATE TABLE likes (
    like_id      INT AUTO_INCREMENT PRIMARY KEY,
    user_id      INT NOT NULL,
    post_id      INT NOT NULL,
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES posts(post_id) ON DELETE CASCADE
);

-- Comments Table
CREATE TABLE comments (
    comment_id   INT AUTO_INCREMENT PRIMARY KEY,
    user_id      INT NOT NULL,
    post_id      INT NOT NULL,
    comment_text TEXT NOT NULL,
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES posts(post_id) ON DELETE CASCADE
);

-- Messages Table
CREATE TABLE messages (
    message_id   INT AUTO_INCREMENT PRIMARY KEY,
    sender_id    INT NOT NULL,
    receiver_id  INT NOT NULL,
    message_text TEXT NOT NULL,
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (receiver_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Followers Table (For following system like Instagram)
CREATE TABLE followers (
    follower_id  INT NOT NULL,
    following_id INT NOT NULL,
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (follower_id, following_id),
    FOREIGN KEY (follower_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (following_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Notifications Table (For follow requests, likes, comments, etc.)
CREATE TABLE notifications (
    notification_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id         INT NOT NULL, -- Who receives the notification
    sender_id       INT NOT NULL, -- Who triggered the notification
    type            ENUM('follow_request', 'follow_accept', 'like', 'comment', 'message') NOT NULL,
    message         VARCHAR(255) NOT NULL, -- Notification message
    is_read         BOOLEAN DEFAULT FALSE, -- Mark if read
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (sender_id) REFERENCES users(user_id) ON DELETE CASCADE
);
w