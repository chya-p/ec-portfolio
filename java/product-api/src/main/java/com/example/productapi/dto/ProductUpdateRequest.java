package com.example.productapi.dto;

import jakarta.validation.constraints.Min;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;

public class ProductUpdateRequest {

    @NotBlank(message = "name must not be blank")
    private String name;

    @NotNull(message = "price is required")
    @Min(value = 0, message = "price must be >= 0")
    private Integer price;

    @NotNull(message = "stock is required")
    @Min(value = 0, message = "stock must be >= 0")
    private Integer stock;

    // getter / setter

    public ProductUpdateRequest() {}

    public String getName() { return name; }
    public Integer getPrice() { return price; }
    public Integer getStock() { return stock; }

    public void setName(String name) { this.name = name; }
    public void setPrice(Integer price) { this.price = price; }
    public void setStock(Integer stock) { this.stock = stock; }
}
