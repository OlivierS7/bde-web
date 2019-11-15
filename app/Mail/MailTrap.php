<?php

namespace App\Mail;

use App\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cookie;
use stdClass;
use Symfony\Component\HttpFoundation\Request;

class MailTrap extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        if ((request('objet') &&  request('content') && request('mail')) != null) {
            $objet = request('objet');
            $content = request('content');
            $mail = request('mail');
            return $this->from('mail@example.com', 'Mailtrap')
                ->subject('Contact')
                ->markdown('mailContact', ['objet' => $objet, 'content' => $content, 'mail' => $mail])
                ->with([
                    'name' => 'New Mailtrap User',
                    'link' => 'https://mailtrap.io/inboxes/751751/messages',
                ]);
        } elseif (true) {
            $totalPrice = request('totalPrice');
            $lastname = session('lastname');
            $firstname = session('firstname');
            $mail = session('mail');
            $produits = json_decode(Cookie::get('panier'));
            $id = session('id');
            $tableau = [];
                foreach ($produits as $produit) {
                    $obj = new stdClass();
                    $obj->produit = (Product::find($produit->id));
                    $obj->quantity = $produit->quantity;
                    $tableau[] = $obj;
                }
            return $this->from('mail@example.com', 'Mailtrap')
                ->subject('Achat')
                ->markdown('mailContact', ['produits' => $tableau, 'id' => $id, 'totalPrice' => $totalPrice, 'firstName' => $firstname, 'lastName' => $lastname, 'mail' => $mail])
                ->with([
                    'name' => 'New Mailtrap User',
                    'link' => 'https://mailtrap.io/inboxes/751751/messages',
                ]);
        }
    }
}
