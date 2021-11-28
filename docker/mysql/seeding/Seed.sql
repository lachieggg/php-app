CREATE DATABASE IF NOT EXISTS website;
USE website;
CREATE TABLE IF NOT EXISTS users (
    uuid varchar(36) NOT NULL,
    name varchar(255),
    email varchar(255),
    password varchar(255),
    created_at timestamp,
    updated_at timestamp,
    is_deleted BOOL NULL,
    is_approved BOOL NULL,
    is_admin BOOL NULL
);

CREATE TABLE IF NOT EXISTS website.user_comments (
    uuid varchar(36) NULL,
    user_uuid varchar(36) NULL,
    comment_text TEXT NULL,
              created_at DATETIME,
              updated_at DATETIME
);
CREATE TABLE IF NOT EXISTS website.blog_posts (
    uuid varchar(36) NULL,
    post_html TEXT NULL,
              is_private TINYINT,
              created_at DATETIME,
              updated_at DATETIME
);
