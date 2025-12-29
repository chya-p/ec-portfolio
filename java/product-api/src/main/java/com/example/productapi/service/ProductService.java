package com.example.productapi.service;

import com.example.productapi.entity.Product;
import com.example.productapi.repository.ProductRepository;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;
import com.example.productapi.dto.ProductResponse;
import com.example.productapi.dto.ProductRequest;
import com.example.productapi.exception.ResourceNotFoundException;


import java.util.List;

@Service
public class ProductService {

    private final ProductRepository repository;

    public ProductService(ProductRepository repository) {
        this.repository = repository;
    }

    public List<ProductResponse> findAll() {
        return repository.findAll().stream()
            .map(p -> new ProductResponse(
                p.getId(),
                p.getName(),
                p.getPrice(),
                p.getStock(),
                p.getCreatedAt()
            ))
            .toList();
    }  

    public Product findById(Long id) {
        return repository.findById(id)
            .orElseThrow(() -> new ResourceNotFoundException("Product not found"));
    }    

    public Product save(Product product) {
        return repository.save(product);
    }

    public void delete(Long id) {
        repository.deleteById(id);
    }

    @Transactional
    public ProductResponse update(Long id, ProductRequest request) {
        Product existing = repository.findById(id)
            .orElseThrow(() -> new ResourceNotFoundException("商品が見つかりません"));

        existing.setName(request.getName());
        existing.setPrice(request.getPrice());
        existing.setStock(request.getStock());

        return new ProductResponse(
            existing.getId(),
            existing.getName(),
            existing.getPrice(),
            existing.getStock(),
            existing.getCreatedAt()
        );
    }

}
