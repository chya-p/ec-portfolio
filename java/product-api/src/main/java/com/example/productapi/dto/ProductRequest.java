package com.example.productapi.dto;

import jakarta.validation.constraints.Min;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;

public class ProductRequest {

    @NotBlank(message = "商品名は必須です")
    private String name;

    @NotNull
    @Min(value = 0, message = "価格は0以上")
    private Integer price;

    @NotNull
    @Min(value = 0, message = "在庫は0以上")
    private Integer stock;

    public String getName() { return name; }
    public Integer getPrice() { return price; }
    public Integer getStock() { return stock; }
}
