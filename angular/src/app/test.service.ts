import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";

@Injectable({
  providedIn: "root"
})
export class TestService {
  private base_url = "http://localhost:8000/api";
  constructor(private http: HttpClient) {}

  test() {
    return this.http.get(`${this.base_url}/test`);
  }
}
