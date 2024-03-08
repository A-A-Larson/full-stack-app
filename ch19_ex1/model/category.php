<?php
class Category {
    public function __construct(
        private int $id,
        private string $name
    ) { }

    public function getID() {
        return $this->id;
    }

    public function setID(int $value) {
        $this->id = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function setName(string $value) {
        $this->name = $value;
    }
}
?>