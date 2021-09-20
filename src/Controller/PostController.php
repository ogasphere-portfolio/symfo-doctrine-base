<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
   
    /**
     * @Route("/add-post", name="add_post")
     */
    public function addProduct(Request $request): Response
    {
        $post = new Post();
        $form = $this->createForm(PostFormType::class, $post);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();
            return $this->redirectToRoute('posts');
        }

        return $this->render("post/post-form.html.twig", [
            "form_title" => "Ajouter un post",
            "form_post" => $form->createView(),
        ]);
    }

    /**
    * @Route("/modify-post/{id}", name="modify_post")
    */
    public function modifyPost(Request $request, int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $post = $entityManager->getRepository(Post::class)->find($id);
        $form = $this->createForm(PostFormType::class, $post);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager->flush();
            return $this->redirectToRoute('posts');
        }

        return $this->render("post/post-form.html.twig", [
            "form_title" => "Modifier un article",
            "form_post" => $form->createView(),
        ]);
    }
    /**
    * @Route("/", name="posts")
    */
    public function posts()
    {
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();

        return $this->render('post/posts.html.twig', [
            "posts" => $posts,
        ]);
    }

    /**
    * @Route("/post/{id}", name="post")
    */
    public function post(int $id): Response
    {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($id);

        return $this->render("post/post.html.twig", [
            "post" => $post,
        ]);
    }

    

    /**
     * @Route("/delete-post/{id}", name="delete_post")
     */
    public function deletePost(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $post = $entityManager->getRepository(Post::class)->find($id);
        $entityManager->remove($post);
        $entityManager->flush();

        return $this->redirectToRoute("posts");
    }
}

    /* Une autre maniére de faire en passant juste l'entité en paramétre ( moins de code )
    /**
     * @Route("/post/{id}", name="post_read", requirements={"id"="\d+"}, methods={"GET"})
     */
 /*    public function read(Post $post): Response
    {
        // lorsque l'on typehint une variable avec une entité doctrine
        // symfony va exécuter le find et nous fournir directement l'entité souhaitée
        //  - attention il faut que le paramètre puisse identifier de manière certaine un seul élément (c'est à que ce soit un champ unique ou une clef étrangère)
        // récupérer le post dont l'identifiant est fournit dans l'url
        // $post = $postRepository->find($id);

        // le fournir à la vue
        return $this->render('post/read.html.twig', [
            'post' => $post,
        ]);
    }  */