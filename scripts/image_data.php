<?php

declare(strict_types=1);

class ImageData {
    private string $name;
    private string $author;
    private int $authorId;
    private string $url;
    private string $hashtag;

    public function __construct(string $name, string $author, 
                                int $authorId, string $url, string $hashtag) {
        $this->name = $name;
        $this->author = $author;
        $this->authorId = $authorId;
        $this->url = $url;
        $this->hashtag = $hashtag;
    }

    public function SetName(string $name): void {
        if (!empty($name))
            $this->name = $name;
    }

    public function SetAuthor(string $author): void {
        if (!empty($author))
            $this->author = $author;
    }

    public function SetAuthorId(int $authorId): void {
        if (!empty($authorId))
            $this->authorId = $authorId;
    }

    public function SetUrl(string $url): void {
        if (!empty($authorId))
            $this->url = $url;
    }

    public function SetHashtag(string $hashtag): void {
        if (!empty($authorId))
            $this->hashtag = $hashtag;
    }

    public function GetName(): string {
        return $this->name;
    }

    public function GatAuthor(): string {
        return $this->author;
    }

    public function GetAuthorId(): int {
        return $this->authorId;
    }

    public function GetUrl(): string {
        return $this->url;
    }

    public function GetHashtag(): string {
        return $this->hashtag;
    }
} 