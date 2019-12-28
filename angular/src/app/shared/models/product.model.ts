import { Image } from './image.model';
export class Product {

    product_id: number;
    category_name: string;
    brand_name: string;
    brand_image: string;
    name: string;
    description: string;
    date_arrived?: Date;
    category_id: number;
    brand_id: number;
    image_id: number;
    image_src:string;
    price: number;
    likes: number;
    
  }
  