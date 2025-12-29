<?php

class ProductRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findAll(): array
    {
        $sql = "SELECT id, name, price, stock, created_at FROM products ORDER BY id DESC";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

       public function deleteById(int $id): void
    {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
        ]);
    }

    public function findById(int $id): ?array
    {
     $sql = "SELECT id, name, price, stock, created_at FROM products WHERE id = :id";
         $stmt = $this->pdo->prepare($sql);
         $stmt->execute([':id' => $id]);

         $product = $stmt->fetch(PDO::FETCH_ASSOC);
         return $product ?: null;
     }

     public function update(int $id, string $name, int $price, int $stock): void
     {
         $sql = "UPDATE products
                 SET name = :name,
                     price = :price,
                     stock = :stock
                 WHERE id = :id";
     
         $stmt = $this->pdo->prepare($sql);
         $stmt->execute([
             ':id'       => $id,
             ':name'     => $name,
             ':price'    => $price,
             ':stock' => $stock,
         ]);
     }     

    public function insert(string $name, int $price, int $stock): void
    {
        $sql = "INSERT INTO products (name, price, stock, created_at)
                VALUES (:name, :price, :stock, NOW())";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':name'     => $name,
            ':price'    => $price,
            ':stock' => $stock,
        ]);
    }

}


