<?php
namespace App\Controller;
use App\Entity\City;
use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\ZipCode;
use App\Entity\Category;
use App\Entity\Officiels;
use App\Form\CommentType;
use App\Entity\Neighborhood;
use App\Entity\PrivateRdvCat;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\core\Type\TextType;
use Symfony\Component\Form\Extension\core\Type\SubmitType;
use Symfony\Component\Form\Extension\core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/main/report", name="report")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        
        $articles = $repo->findAll();
        
        
        return $this->render('main/report.html.twig', [
            'controller_name' => 'MainController',
            'articles' => $articles
        ]);
    }
    /**
     * @Route("/", name="home")
     */
    public function home(){
        return $this->render('main/home.html.twig');
    }
/**
     * @Route("/main/report/create" , name="blog_create")
     * @Route("/main/report/{id}/edit", name="blog-edit")
     */
    public function forms (Article $article =null , Request $request , ObjectManager $manager){
        if( !$article){
        $article = new Article();
        }
        $form = $this->createFormBuilder($article)
                    ->add('title')
                    ->add('category', EntityType::class, [
                        'class' => Category::class,
                        'choice_label' => 'title'
                    ])
                    ->add('Neighborhood', EntityType::class, [
                        'class' => Neighborhood::class,
                        'choice_label' => 'name'
                    ])
                    ->add('City', EntityType::class, [
                        'class' => City::class,
                        'choice_label' => 'city'
                    ])
                    ->add('zipCode', EntityType::class, [
                        'class' => ZipCode::class,
                        'choice_label' => 'zipCode'
                    ])
                    ->add('content')
                    ->add('image')
                    ->add('lattitude')
                    ->add('longitude')
                    ->getForm();
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            if(!$article->getId()){
            $article->setCreatedAt(new \DateTime());
            }
            $manager->persist($article);
            $manager->flush();
            return $this->redirectToRoute('blog_show' ,['id'=>$article->getId()]);
        }
    return $this->render('main/create.html.twig', [
            'formArticle' =>$form->createView(),
            'editMode' => $article->getId()!== null
        ]);
    }
    
    /**
     * @Route("/main/request/{id}", name="blog_show")
     */
    public function show( Article $article  , Request $request , ObjectManager $manager  ){
        $comment = new Comment();
        $form = $this->createForm(CommentType::class , $comment);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $comment->setCreatedAt(new \DateTime())
                    ->setArticle($article);
            $manager->persist($comment);
            $manager->flush();
            return $this->redirectToRoute('blog_show', ['id'=>$article->getId()]);
        }
        
        return $this->render('main/show.html.twig', [
            'article' => $article,
            'commentForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/main/officiel" , name="officel_show")
     */
    
     public function officel(  Request $request , ObjectManager $manager ){

        
            $rdv = new PrivateRdvCat();
        

            $form = $this->createFormBuilder($rdv)
                    ->add('description')
                    ->add('officiel', EntityType::class, [
                        'class' => officiels::class,
                        'choice_label' => 'name'
                    ])
                    ->add('date')
                    ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            
            $manager->persist($rdv);
            $manager->flush();
            return $this->redirectToRoute('officel_show');
        }


        $repo = $this->getDoctrine()->getRepository(Officiels::class);
        
        $officiels = $repo->findAll();

        $repo1 = $this->getDoctrine()->getRepository(PrivateRdvCat::class);
        $rdv = $repo1->findAll();
        $articles = $repo->findAll();


        

  


        return $this->render('main/showOfficels.html.twig', [
            'officiels' => $officiels,
            'formRDV' => $form->createView(),
            'rdvs'=>$rdv
            
        ]);

     }



     



}