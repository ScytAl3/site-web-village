<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{

    /*-----------------------------------------------------------------------------------
     *                                           Properties 
    ----------------------------------------------------------------------------------- */
    #region

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Length(min=2, max=100)
     */
    private $firstName;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Length(min=2, max=100)
     */
    private $lastName;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Regex(
     *      pattern = "/^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$/",
     *      htmlPattern= "^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$",
     *      message = "International phone number e.g. : +33610254585."
     * )
     */
    private $phone;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Length(min=10)
     */
    private $message;

    #endregion

    /*-----------------------------------------------------------------------------------
     *                                         Getters - Setters 
    ----------------------------------------------------------------------------------- */

    #region

    /**
     * Get the value of firstName
     *
     * @return  string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @param  string $firstName
     *
     * @return  self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     *
     * @return  string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @param  string $lastName
     *
     * @return  self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get pattern = "/^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$/",
     *
     * @return  string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * Set pattern = "/^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$/",
     *
     * @param  string $phone  pattern = "/^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$/",
     *
     * @return  self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return  string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  string $email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of message
     *
     * @return  string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @param  string $message
     *
     * @return  self
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    #endregion


}
