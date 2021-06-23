# Routes

## Sprint 1

| URL | Méthode HTTP | Controller | Méthode | Titre | Contenu | Commentaire |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 catégories | - |
|/legal-mentions/| `GET`| `MainController` | `legalMentions` | Legal Mentions | Legal Mentions | - |
| `/catalog/category/[id]` | `GET` | `CatalogController` | `category` | #Name of the category# |  Products attached to the category | [id] represents the id of the category |
| `/catalog/type/[id]` | `GET` | `CatalogController` | `type` | #Name of the type# |  Products attached to the type | [id] represents the id of the type |
| `/catalog/brand/[id]` | `GET` | `CatalogController` | `brand` | #Name of the brand# | products attached to the brand  | [id] represents the id of the brand] |
| `/catalog/product/[id]` | `GET` | `CatalogController` | `product` | # Name of the Product #| Product details | (`[id]`) => represent the Product id |