<?php

namespace App\Classe;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Cart
{
    private  $session;
    private  $entityManager;

    public function __construct(EntityManagerInterface $entityManager ,SessionInterface $session)
    {
        $this->session = $session;
        $this->entityManager = $entityManager;
    }

    //  Ajouter au panier
    public function add($id)
    {
        $cart =$this->session->get('cart',[]);

        if (!empty($cart[$id])){
            $cart[$id]++;
        }else{
            $cart[$id] =1;
        }

        $this->session->set('cart',$cart);
    }

    //Returne le panier
    public function get()
    {
        return $this->session->get('cart');
    }

    //Supprimer le panier
    public function remove()
    {
        return $this->session->remove('cart');
    }

    //Supprimer un seule article du panier
    public function  delete($id)
    {
        $cart =$this->session->get('cart',[]);

        unset($cart[$id]);

        return $this->session->set('cart',$cart);
    }

    //Decrementation du quantité
    public function  decrease($id)
    {
        $cart =$this->session->get('cart',[]);

        if($cart[$id]>1){
            $cart[$id]--;
        }else{
            //Supprimer le produit
            unset($cart[$id]);
        }
        return $this->session->set('cart',$cart);
    }

    public function getFull()
    {
        $cartComplete =[];

        if ($this->get()){
            foreach ($this->get() as $id =>$quantity){
               $produit_object = $this->entityManager->getRepository(Product::class)->findOneById($id);

               if (!$produit_object){
                   $this->delete($id);
                   continue;
               }

                $cartComplete[] =[
                    'product' =>$produit_object,
                    'quantity' =>$quantity
                ];
            }
        }
        return $cartComplete;
    }
}