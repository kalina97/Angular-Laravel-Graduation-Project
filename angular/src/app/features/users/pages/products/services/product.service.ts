import { Injectable } from '@angular/core';
import { ReplaySubject, Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { map } from "rxjs/operators";
import { Product } from 'src/app/shared/models/product.model';

@Injectable({
  providedIn: 'root'
})
export class ProductService {

  private refreshRole: ReplaySubject<boolean> = new ReplaySubject<boolean>();
  private path = "http://localhost:8000/api";
  constructor(private http: HttpClient) {}


  getAllProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/allProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  getMenProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/menProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  getWomenProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/womenProducts`);
  }

  getKidsProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/kidsProducts`);
  }

  getSportsProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/sportsProducts`);
  }

  //brands with products part

  getNikeProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/nikeProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  getAdidasProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/adidasProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  getAsicsProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/asicsProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  getReebokProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/reebokProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  getPumaProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/pumaProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  getNBProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/nbProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  getHummelProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/hummelProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  //all products sorting data

  getSortNameAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/nameAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  getSortNameDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/nameDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  getSortPriceAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/priceAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  getSortPriceDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/priceDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  //men products sorting data

  menSortNameAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/menNameAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  menSortNameDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/menNameDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  menSortPriceAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/menPriceAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  menSortPriceDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/menPriceDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  //women products sorting data

  womenSortNameAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/womenNameAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  womenSortNameDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/womenNameDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  womenSortPriceAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/womenPriceAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  womenSortPriceDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/womenPriceDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  //kids products sorting data

  kidsSortNameAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/kidsNameAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  kidsSortNameDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/kidsNameDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  kidsSortPriceAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/kidsPriceAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  kidsSortPriceDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/kidsPriceDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  //sports products sorting data

  sportsSortNameAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/sportsNameAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  sportsSortNameDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/sportsNameDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  sportsSortPriceAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/sportsPriceAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  sportsSortPriceDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/sportsPriceDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  //nike products sorting data

  nikeSortNameAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/nikeNameAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  nikeSortNameDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/nikeNameDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  nikeSortPriceAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/nikePriceAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  nikeSortPriceDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/nikePriceDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  //adidas products sorting data

  adidasSortNameAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/adidasNameAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  adidasSortNameDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/adidasNameDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  adidasSortPriceAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/adidasPriceAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  adidasSortPriceDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/adidasPriceDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  //reebok products sorting data

  reebokSortNameAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/reebokNameAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  reebokSortNameDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/reebokNameDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  reebokSortPriceAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/reebokPriceAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  reebokSortPriceDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/reebokPriceDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  //asics products sorting data

  asicsSortNameAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/asicsNameAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  asicsSortNameDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/asicsNameDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  asicsSortPriceAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/asicsPriceAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  asicsSortPriceDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/asicsPriceDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }



  //puma products sorting data

  pumaSortNameAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/pumaNameAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  pumaSortNameDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/pumaNameDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  pumaSortPriceAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/pumaPriceAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  pumaSortPriceDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/pumaPriceDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }



  //new balance products sorting data

  nbSortNameAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/nbNameAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  nbSortNameDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/nbNameDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  nbSortPriceAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/nbPriceAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  nbSortPriceDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/nbPriceDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  //hummel products sorting data

  hummelSortNameAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/hummelNameAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  hummelSortNameDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/hummelNameDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }


  hummelSortPriceAscProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/hummelPriceAscProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }

  hummelSortPriceDescProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.path}/hummelPriceDescProducts`).pipe(
      map((response: Product[]) => {
        console.log(response);
        return response;
      })
    );
  }



  //product details
  getProductDetails(id: number): Observable<Product> {
    return this.http.get<Product>(`${this.path}/productDetails/${id}`);
  }
  
  toRefreshNavigation() {
    this.refreshRole.next(true);
  }

  get refreshRole$(): Observable<boolean> {
    return this.refreshRole.asObservable();
  }

}
