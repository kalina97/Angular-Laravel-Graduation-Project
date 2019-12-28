import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, UrlTree, Router } from '@angular/router';
import { Observable } from 'rxjs';
import { TokenService } from '../token.service';

@Injectable({
  providedIn: 'root'
})
export class AdminGuard implements CanActivate {
  canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot
  ): Observable<boolean> | Promise<boolean> | boolean {
    if (!this.token.loggedIn()) {
      this.router.navigateByUrl("/auth/login");
    } else {
      if (!this.token.isAdmin()) {
        this.router.navigateByUrl("/profile");
        return false;
      }
    }
    return true;
  }
  constructor(private token: TokenService, private router: Router) {}
}
