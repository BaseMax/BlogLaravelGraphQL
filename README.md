# GraphQL-Based Blog System - Laravel

Welcome to the GraphQL-Based Blog System, a full-featured and feature-rich blog application developed in Laravel 10 and PHP 8.2. This application leverages GraphQL instead of a traditional RESTful API to provide a more flexible and efficient way of fetching data.

The GraphQL-Based Blog System is a powerful and modern blog application that allows users to read, create, update, and delete blog posts, manage comments, and perform various other operations through a GraphQL API. It offers a more intuitive and customizable way of querying data compared to RESTful APIs.

## Features

- **User Authentication**: Allow users to sign up, log in, and manage their profiles.
- **Blog Posts**: Create, read, update, and delete blog posts with different attributes like title, content, tags, and date.
- **Comments**: Users can leave comments on blog posts.
- **Categories and Tags**: Organize blog posts into categories and add tags for easy navigation.
- **Search**: Implement a powerful search functionality to find blog posts by keywords.
- **Pagination**: Handle large sets of data with pagination support.
- **Error Handling**: Gracefully handle errors and provide helpful messages in responses.
- **Security**: Implement authentication and authorization to protect sensitive operations.
- **GraphQL Subscriptions (Real-Time Updates)**: Optionally, you can add real-time updates for comments or new blog posts using GraphQL subscriptions.

## Requirements

To run this blog system, you need the following software and tools installed on your server:

- PHP 8.2
- Laravel 10 or higher
- Composer
- MySQL or any compatible database system

## Installation

- Clone the repository or download the source code.
- Run `composer install` to install the required dependencies.
- Create a new MySQL database for the blog system.
- Copy the `.env.example` file to `.env` and configure your database connection settings.
- Run `php artisan migrate` to create the necessary database tables.

## Configuration

- Customization: The application is highly customizable. You can modify views, styles, and **GraphQL** schema to suit your needs.
- Environment Variables: The `.env` file contains various environment variables to control the behavior of the application. Make sure to configure them correctly.

## Usage

To run the blog system, use the following command:

```
php artisan serve
```

Now open `http://localhost:8000/graphiql`. this is a environment for running graphql queries and get response. in below window you can add Authorization token(you can get that after login or register) and dont forget to add `Content-Type: application/json` header.

## GraphQL

**Queries:**

- Get all blog posts: Retrieve a list of all blog posts with their titles and dates.

```graphql
query {
  posts {
    title
    content
    author {
      username
    }
    created_at
    updated_at
  }
}
```

```json
{
  "data": {
    "posts": [
      {
        "title": "pizza",
        "content": "here we want to learn how make a pizza.",
        "author": {
          "username": "AliAhmadi"
        },
        "created_at": null,
        "updated_at": null
      }
    ]
  }
}
```

- Get a single blog post: Retrieve detailed information about a specific blog post by its ID.

```graphql
query {
  post(id: 2) {
    id
    title
    content
    created_at
    updated_at
    author {
      name
      username
      email
    }
  }
}
```

```json
{
  "data": {
    "post": {
      "id": "2",
      "title": "pizza",
      "content": "here we want to learn how make a pizza.",
      "created_at": null,
      "updated_at": null,
      "author": {
        "name": "Ali",
        "username": "AliAhmadi",
        "email": "aliahmadi82c@gmail.com"
      }
    }
  }
}
```

- Search blog posts: Search for blog posts based on keywords and retrieve a list of matching posts.

```graphql
query {
  search(key: "pizza") {
    id
    title
    content
    created_at
    updated_at
    category {
      description
    }
  }
}
```
```json
{
  "data": {
    "search": [
      {
        "id": "2",
        "title": "pizza",
        "content": "here we want to learn how make a pizza.",
        "created_at": null,
        "updated_at": null,
        "category": {
          "description": "posts related to food world"
        }
      }
    ]
  }
}
```

- Get all categories: Retrieve a list of all blog categories.

```graphql
query {
  categories {
    id
    name
    description
    created_at
    updated_at
    __typename
  }
}
```

```json
{
  "data": {
    "categories": [
      {
        "id": "1",
        "name": "food",
        "description": "posts related to food world",
        "created_at": null,
        "updated_at": null,
        "__typename": "Category"
      }
    ]
  }
}
```

- Get all tags: Retrieve a list of all blog tags.

```graphql
query {
  tags {
    id
    name
    description
    created_at
    updated_at
    __typename
  }
}
```

```json
{
  "data": {
    "tags": []
  }
}
```

- Get popular posts: Retrieve a list of the most popular blog posts based on views or comments.

```graphql
query {
  popularPosts {
    id
    title
    content
    author {
      username
      email
    }
    likes
    views
    isPublished
    created_at
    updated_at
  }
}
```

```json
{
  "data": {
    "popularPosts": [
      {
        "id": "2",
        "title": "pizza",
        "content": "here we want to learn how make a pizza.",
        "author": {
          "username": "AliAhmadi",
          "email": "aliahmadi82c@gmail.com"
        },
        "likes": 34,
        "views": 2974,
        "isPublished": true,
        "created_at": null,
        "updated_at": null
      }
    ]
  }
}
```

- Get user profile: Retrieve information about the currently logged-in user.
- Get user's own posts: Retrieve a list of blog posts created by the currently logged-in user.
- Get user's favorite posts: Retrieve a list of blog posts marked as favorites by the currently logged-in user.
- Get recommended posts: Retrieve a list of recommended blog posts based on user preferences or behavior.
- Get posts by category: Retrieve all blog posts belonging to a specific category.
- Get posts by tag: Retrieve all blog posts associated with a specific tag.
- Get total number of posts: Retrieve the total number of blog posts in the system.Get posts by author: Retrieve all blog posts written by a specific author.
- Get user by ID: Retrieve detailed information about a user by their ID.
- Get trending tags: Retrieve a list of the most popular tags used in blog posts.
- Get related posts: Retrieve a list of related blog posts based on the current post's tags or category.
- Get post comments count: Retrieve the total number of comments for a specific blog post.
- Get user activity: Retrieve a user's recent activity, including posts created, comments made, and liked posts.
- Get most active users: Retrieve a list of the most active users based on the number of posts and comments they've made.
- Get user notifications: Retrieve a list of notifications for the currently logged-in user.
- Get posts by date range: Retrieve blog posts published within a specified date range.
- Get posts by popularity: Retrieve blog posts sorted by popularity (e.g., based on likes, views, or comments).
- Get posts by user's location: Retrieve blog posts based on the user's geolocation or specified location filter.
- Get posts with specific metadata: Retrieve blog posts based on custom metadata or attributes associated with them.
- Get user activity by date: Retrieve a user's activity within a specified date range, including posts and comments.
- Get posts with attachments: Retrieve blog posts that have attachments such as images, videos, or files.
- Get posts by popularity in a time range: Retrieve blog posts sorted by popularity within a specific time period (e.g., the last month).
- Get posts by tag popularity: Retrieve tags ordered by their popularity based on the number of times they have been used.
- Get posts with similar titles: Retrieve blog posts with titles similar to a given query.
- Get posts based on language: Retrieve blog posts written in a specific language or language code.

**Mutations:**

- Create a new blog post: Create a new blog post with title, content, category, and tags.
- Update a blog post: Update an existing blog post by its ID with new title, content, category, or tags.
- Delete a blog post: Delete a specific blog post by its ID.
- Create a new comment: Add a new comment to a blog post with the author's name and comment content.
- Update a comment: Update an existing comment by its ID with new content.
- Delete a comment: Delete a specific comment by its ID.
- Like a post: Allow a user to like a blog post, incrementing its likes count.
- Dislike a post: Allow a user to remove their like from a blog post, decrementing its likes count.
- Add post to favorites: Allow a user to add a blog post to their list of favorite posts.
- Remove post from favorites: Allow a user to remove a blog post from their list of favorite posts.
- Register new user: Create a new user account with username, email, and password.
- Login: Authenticate a user and issue an access token upon successful login.
- Logout: Invalidate the user's access token upon logout.
- Update user profile: Update the currently logged-in user's profile information.
- Change password: Allow the user to change their account password.
- Create a new category: Allow an admin user to create a new blog post category.
- Update a category: Allow an admin user to update the name or description of a category.
- Delete a category: Allow an admin user to delete a category, along with its associated blog posts.
- Create a new tag: Allow an admin user to create a new blog post tag.
- Update a tag: Allow an admin user to update the name or description of a tag.
- Delete a tag: Allow an admin user to delete a tag, removing it from all associated blog posts.
- Flag inappropriate content: Allow users to flag a blog post or comment as inappropriate for review by administrators.
- Approve flagged content: Allow administrators to review flagged content and mark it as approved or disapproved.
- Create a new user role: Allow an admin user to create a new role with specific permissions.
- Update user role: Allow an admin user to update the permissions of an existing role.
- Add post view: Increment the view count of a blog post when a user visits it.
- Create a new user account with social login: Allow users to register using their social media accounts (e.g., Google or Facebook).
- Reset user password: Allow users to request a password reset email if they forget their password.
- Confirm email address: Enable users to confirm their email address after registration.
- Delete user account: Allow users to delete their own accounts and associated data.
- Share post: Allow users to share blog posts via email or social media.
- Pin post: Allow an admin user to pin a blog post to the top of the homepage or a specific category.
- Unpin post: Allow an admin user to remove a pinned status from a blog post.
- Moderate comments: Allow moderators to review and approve or reject comments before they appear on the site.

## GraphQL Schema

The GraphQL schema defines the types, queries, mutations, and subscriptions available in the API. The schema can be found in the graphql directory.

```graphql
type User {
  id: ID!
  username: String!
  email: String!
  posts: [Post!]!
  favoritePosts: [Post!]!
  createdAt: String!
  updatedAt: String!
}

type Category {
  id: ID!
  name: String!
  description: String
  posts: [Post!]!
}

type Tag {
  id: ID!
  name: String!
  description: String
  posts: [Post!]!
}

type Comment {
  id: ID!
  content: String!
  author: User!
  post: Post!
  createdAt: String!
  updatedAt: String!
}

type Post {
  id: ID!
  title: String!
  content: String!
  author: User!
  category: Category!
  tags: [Tag!]!
  comments: [Comment!]!
  likes: Int!
  views: Int!
  isPublished: Boolean!
  createdAt: String!
  updatedAt: String!
}

type Notification {
  id: ID!
  message: String!
  user: User!
  createdAt: String!
}

type AuthPayload {
  token: String!
  user: User!
}

type Query {
  allPosts: [Post!]!
  post(id: ID!): Post
  searchPosts(query: String!): [Post!]!
  allCategories: [Category!]!
  allTags: [Tag!]!
  recentPosts(limit: Int!): [Post!]!
  popularPosts(limit: Int!): [Post!]!
  commentsByPost(postId: ID!): [Comment!]!
  user(id: ID!): User
  currentUser: User
  trendingTags(limit: Int!): [Tag!]!
}

type Mutation {
  createPost(title: String!, content: String!, categoryId: ID!, tagIds: [ID!]!): Post!
  updatePost(id: ID!, title: String!, content: String!, categoryId: ID!, tagIds: [ID!]!): Post!
  deletePost(id: ID!): ID
  createComment(postId: ID!, content: String!): Comment!
  updateComment(id: ID!, content: String!): Comment!
  deleteComment(id: ID!): ID
  likePost(postId: ID!): Post!
  dislikePost(postId: ID!): Post!
  addToFavorites(postId: ID!): User!
  removeFromFavorites(postId: ID!): User!
  register(username: String!, email: String!, password: String!): AuthPayload!
  login(email: String!, password: String!): AuthPayload!
  logout: Boolean!
  updateProfile(username: String!, email: String!): User!
  changePassword(currentPassword: String!, newPassword: String!): Boolean!
}

schema {
  query: Query
  mutation: Mutation
}
```

## Contributing

We welcome contributions from the community. If you want to contribute to the project, please fork the repository, make your changes, and submit a pull request.

## License

The GraphQL-Based Blog System is open-source software released under the MIT License. See the LICENSE file for more information.

Copyright 2023, Max Base
