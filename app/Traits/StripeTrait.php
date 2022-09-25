<?php

namespace App\Traits;

use Stripe\StripeClient;
use Exception;

trait StripeTrait
{
    function createProduct($name)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        try {
            $product = $stripe->products->create(
                array('name' => $name)
            );
            return array('success' => $product);
        } catch (Exception $e) {
            $error = $e->getMessage();
            return array('error' => $error);
        }
    }
    //
    function createPrice($productID, $amount, $interval)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        try {
            $cents = $amount * 100; //dollars into cents
            $price = $stripe->prices->create(
                array(
                    'unit_amount' => $cents,
                    'currency' => 'usd',
                    'recurring' => array(
                        'interval' => $interval
                    ),
                    'product' => $productID
                )
            );
            return array('success' => $price);
        } catch (Exception $e) {
            $error = $e->getMessage();
            return array('error' => $error);
        }
    }

    function retrieveStripeProduct($productID)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        try {
            $productInfo = $stripe->products->retrieve($productID);
            return array('success' => $productInfo);
        } catch (Exception $e) {
            $error = $e->getMessage();
            return array('error' => $error);
        }
    }

    function retrieveStripePrice($priceID)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        try {
            $priceInfo = $stripe->prices->retrieve($priceID);
            return array('success' => $priceInfo);
        } catch (Exception $e) {
            $error = $e->getMessage();
            return array('error' => $error);
        }
    }

    function createCustomer($token)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        try {
            $customer = $stripe->customers->create(
                array(
                    'source' => $token
                )
            );
            return array('success' => $customer);
        } catch (Exception $e) {
            $error = $e->getMessage();
            return array('error' => $error);
        }
    }

    function createSubscription($stripe_customer_id, $stripe_price_id)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        try {
            $subscription = $stripe->subscriptions->create(
                array(
                    'customer' => $stripe_customer_id,
                    'items' => array(
                        array('price' => $stripe_price_id)
                    )
                )
            );
            return array('success' => $subscription);
        } catch (Exception $e) {
            $error = $e->getMessage();
            return array('error' => $error);
        }
    }

    function updateSubscription($stripeSubscriptionID, $stripePriceID)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        try {
            $subscription = $this->stripe->subscriptions->update(
                $stripeSubscriptionID,
                array(
                    'items' => array(
                        array('plan' => $stripePriceID)
                    )
                )
            );
            return array('success' => $subscription);
        } catch (Exception $e) {
            $error = $e->getMessage();
            return array('error' => $error);
        }
    }

    function retrieveSubscription($subID)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        try {
            $subInfo = $stripe->subscriptions->retrieve($subID);
            return array('success' => $subInfo);
        } catch (Exception $e) {
            $error = $e->getMessage();
            return array('error' => $error);
        }
    }

    function cancelSubscription($subID)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        try {
            $subInfo = $stripe->subscriptions->cancel($subID);
            return $subInfo;
        } catch (Exception $e) {
            $error = $e->getMessage();
            return array('error' => $error);
        }
    }
}
