<?php
class Product {
    private int $id;

    public function __construct(
        private Category $category,
        private string $code,
        private string $name,
        private string $description,
        private float $price,
        private float $discount_percent,
    ) { }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory(Category $value) {
        $this->category = $value;
    }

    public function getID() {
        return $this->id;
    }

    public function setID(int $value) {
        $this->id = $value;
    }

    public function getCode() {
        return $this->code;
    }

    public function setCode(string $value) {
        $this->code = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function setName(string $value) {
        $this->name = $value;
    }
    
    public function getDescription() {
        return $this->description;
    }

    public function setDescription(string $value) {
        $this->description = $value;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getPriceFormatted() {
        $formatted_price = number_format($this->price, 2);
        return $formatted_price;
    }

    public function setPrice(float $value) {
        $this->price = $value;
    }

    public function getDiscountPercent() {
        return $this->discount_percent;
    }
    
    public function getDiscountPercentFormatted() {
        $formatted_percent = number_format($this->discount_percent, 0);
        return $formatted_percent;
    }
    
    public function setDiscountPercent(float $value) {
        $this->discount_percent = $value;
    }

    public function getDiscountAmount() {
        $discount_percent = $this->getDiscountPercent() / 100;
        return $this->price * $discount_percent;
    }
    
    public function getDiscountAmountFormatted() {
        $discount_amount = $this->getDiscountAmount();
        $discount_amount_r = round($discount_amount, 2);
        $discount_amount_f = number_format($discount_amount_r, 2);
        return $discount_amount_f;
    }

    public function getDiscountPriceFormatted() {
        $discount_price = $this->price - $this->getDiscountAmount();
        $discount_price_f = number_format($discount_price, 2);
        return $discount_price_f;
    }

    public function getImageFilename() {
        $image_filename = $this->code . '_m.png';
        return $image_filename;
    }

    public function getImagePath(string $app_path) {
        $image_path = $app_path.'images/' . $this->getImageFilename();
        return $image_path;
    }

    public function getImageAltText() {
        $image_alt = 'Image: ' . $this->getImageFilename();
        return $image_alt;
    }
}
?>