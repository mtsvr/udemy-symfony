<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $blogPost = new BlogPost();
        $blogPost->setAuthor('mati');
        $blogPost->setContent('post content');
        $blogPost->setTitle('initial post???');
        $blogPost->setPublished(new \DateTime());
        $blogPost->setSlug('initial-post');

        $manager->persist($blogPost);

        $manager->flush();
    }
}
