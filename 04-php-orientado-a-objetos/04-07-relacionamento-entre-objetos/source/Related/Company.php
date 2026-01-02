<?php

namespace Source\Related;

class Company
{
    private $company;

    /**
     * @var Address
     */
    private $address;
    private $team;

    /**
     * @var
     */
    private $products;

    public function bootCompany($company, $address)
    {
        $this->company = $company;
        $this->address = $address;
    }

    public function boot($company, Address $address)
    {
        $this->company = $company;
        $this->address = $address;
    }

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function addMemberToTeam($firstName, $lastName, $role = false)
    {
        $this->team[] = new User($firstName, $lastName, $role);
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($company): void
    {
        $this->company = $company;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress($address): void
    {
        $this->address = $address;
    }

    public function getTeam()
    {
        return $this->team;
    }

    public function setTeam($team): void
    {
        $this->team = $team;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function setProducts($products): void
    {
        $this->products = $products;
    }


}